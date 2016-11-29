import json
import xml.etree.ElementTree
from flask import Flask
from flask import request
from flaskext.mysql import MySQL
from werkzeug import generate_password_hash, check_password_hash

app = Flask(__name__)

mysql = MySQL()
with open('config/mysql.json') as f:
    conf = json.load(f)
    app.config['MYSQL_DATABASE_USER'] = conf['user']
    app.config['MYSQL_DATABASE_PASSWORD'] = conf['password']
    app.config['MYSQL_DATABASE_DB'] = conf['database']
    app.config['MYSQL_DATABASE_HOST'] = conf['host']
mysql.init_app(app)

@app.route('/signup', methods=['POST'])
def signup():
    try:
        user_id = request.args.get('user_id', '')
        user_name = request.args.get('user_name', '')
        password = request.args.get('password', '')
        email = request.args.get('email', '')
        tel = request.args.get('tel', '')
        user_type = request.args.get('user_type', '')
        team = request.args.get('team', '')
        if (user_id and user_name and password and email
                and tel and user_type and team):
            try:
                user_id = int(user_id)
                user_type = int(user_type)
                team = int(team)
            except Exception as e:
                print e.message
                return 'input illegal'
            password = generate_password_hash(password)
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = "INSERT INTO user VALUES (%s, %s, %s, %s, %s, %s, %s)"
            cursor.execute(sql, (user_id, user_name, password, email, tel, user_type, team))
            data = cursor.fetchall()

            # execute successfully
            if len(data) == 0:
                conn.commit()
                return 'success'
            else:
                return 'insert error'
        else:
            return 'input error'
    except Exception as e:
        print e.message
        return 'user_id has existed'


@app.route('/get_project', methods = ['GET'])
def get_project():
    if request.args.has_key('sid'):
        project_id = request.args['sid']
        try:
            retdata = {}
            conn = mysql.connect()
            cursor = conn.cursor()
            fields = 'info, progress, speciesName, img, para'
            sql = 'select %s from project where project_id = %s' %(fields, project_id)
            cursor.execute(sql)
            info, progress, speciesName, img, para = cursor.fetchall()[0]
            retdata = {'info':info, 'progress':progress, 'intro':{'name':speciesName, 'img':img, 'para':para}}

            sql = 'select title, link from project_paper where project_id = %s' %(project_id)
            cursor.execute(sql)
            project_paper = cursor.fetchall()
            sql = 'select article_id, title, link from project_article where project_id = %s' %(project_id)
            cursor.execute(sql)
            project_article = cursor.fetchall()

            retdata['paperlist'] = [{'title':title, 'link':link} for title, link in project_paper]
            retdata['articlelist'] = [{'aid':aid, 'title':title, 'link':link} for aid, title, link in project_article]

            d = [project_paper, project_article]
            return json.dumps(retdata)
        except Exception as e:
            print 'database exception!!', e.message
        return project_id
    else:
        try:
            retdata = []
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = "select distinct speciesName from project"
            cursor.execute(sql)
            data = cursor.fetchall()
            if len(data) != 0:
                for d in data:
                    sql = "select project_id, speciesName, name from project where speciesName = '%s'" %(d)
                    cursor.execute(sql)
                    specieslist_data = cursor.fetchall()
                    specieslist = []
                    for species in specieslist_data:
                        specieslist.append({'name':species[2], 'sid':species[0]})
                    retdata.append({'name':d[0], 'specieslist':specieslist})
                json_str = json.dumps(retdata)
                return json_str
            else:
                print 'no any species in database'
        except Exception as e:
            print 'sql failed', e.message

@app.route('/get_team', methods = ['GET'])
def get_team():
    if request.args.has_key('sid'):
        sid = request.args['sid']
        retdata = {}
        conn = mysql.connect()
        cursor = conn.cursor()
        sql = 'select info, direction , task from member where sid = ' + sid
        cursor.execute(sql)
        data = cursor.fetchall()
        info, direction, task = data[0]
        retdata = {'info':info, 'direction':direction, 'task':task}
        articles = []
        sql = 'select title, link from member_article where member_id = ' + str(sid)
        cursor.execute(sql)
        data = cursor.fetchall()
        for title, link in data:
            articles.append({'title':title, 'link':link})
        retdata['articlelist'] = articles
        return json.dumps(retdata)
    else:
        try:
            tempdata = {}
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = 'select sid, group_name, name from member'
            cursor.execute(sql)
            data = cursor.fetchall()
            for sid, group_name, name in data:
                if tempdata.has_key(group_name):
                    tempdata[group_name].append({'name':name, 'sid':sid})
                else:
                    tempdata[group_name] = [{'name':name, 'sid':sid}]
            retdata = []
            for k, v in tempdata.items():
                retdata.append({'name':k, 'memberList':v})
            return json.dumps(retdata)
        except Exception as e:
            print 'database error', e.message

@app.route('/get_communication', methods = ['GET'])
def get_cummunication():
    if request.args.has_key('sid'):
        conf_id = int(request.args['sid'])
        try:
            retdata = {}
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = 'select conference_detail from conference where conf_id = %d' %(conf_id)
            cursor.execute(sql)
            data = cursor.fetchall()
            retdata['conference_detail'] = data[0][0]

            sql = 'select title, link from conference_news where conf_id = %d' %(conf_id)
            cursor.execute(sql)
            data = cursor.fetchall()
            retdata['conference_news'] = [{'title':title, 'link':link} for title, link in data]
            return json.dumps(retdata)
        except Exception as e:
            print 'database failed', e.message
    else:
        try:
            retdata = []
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = 'select conf_id, year, name from conference'
            cursor.execute(sql)
            data = cursor.fetchall()
            temp_dict = {}
            for conf_id, year, name in data:
                if temp_dict.has_key(str(year)):
                    temp_dict[str(year)].append({'name':name, 'sid':conf_id})
                else:
                    temp_dict[str(year)] = [{'name':name, 'sid':conf_id}]
            temp_list = sorted(temp_dict.items(), key=lambda x:x[0], reverse=True)
            for year, conf_list in temp_list:
                retdata.append({'name':year, 'conferenceList':conf_list})
            return json.dumps(retdata)
        except Exception as e:
            print 'database failed', e.message

@app.route('/get_tools', methods = ['GET'])
def get_tools():
    if request.args.has_key('sid'):
        sid = int(request.args['sid'])
        try:
            retdata = {}
            conn = mysql.connect()
            cursor = conn.cursor()
            sql = 'select title, link from tools where sid = %d' %(sid)
            cursor.execute(sql)
            data = cursor.fetchall()
            temp_list = []
            for title, link in data:
                temp_list.append({'title':title, 'link':link})
            retdata['tools_link'] = temp_list
            return json.dumps(retdata)
        except Exception as e:
            print 'database error', e.message
    else:
        return 'wrong parameter for this method'

@app.route('/get_paper', methods = ['GET'])
def get_paper():
    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        sql = 'select year, article_id, title, link, author from article'
        cursor.execute(sql)
        data = cursor.fetchall()

        years = set([d[0] for d in data])
        retdata = {}
        for year, article_id, title, link, author in data:
            key = 'articlelist' + str(year)
            newdata = {'title':title, 'author':author, 'number':str(article_id), 'link':link}
            if retdata.has_key(key):
                retdata[key].append(newdata)
            else:
                retdata[key] = [newdata]
        return json.dumps(retdata)
    except Exception as e:
        print 'database error', e.message

@app.route('/get_progress', methods = ['GET'])
def get_progress():
    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        sql = 'select * from progress'
        cursor.execute(sql)
        data = cursor.fetchall()
        progress_id, title, date, img, body = data[0]
        retdata = {'title':title, 'date':date.strftime('%Y-%m-%d'), 'img':img, 'body':body}
        return json.dumps(retdata)
    except Exception as e:
        print 'database error', e.message

@app.route('/set_project', methods = ['POST'])
def set_project():
    data = request.form
    name, speciesName, img, info, intro = data['sname'], data['category_name'], data['intro_img'], data['info'], data['intro_para']
    sql = """update project set project.name="%s", project.speciesName = "%s",
        project.img="%s", project.info="%s", project.intro="%s" where project.project_id='%d'""" %(name, speciesName, img, info, intro, int(data['sid']))
    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        cursor.execute(sql)
        data = cursor.fetchall()
        if len(data) == 0:
            conn.commit()
            return 'success'
        else:
            return 'database insertion failed'
    except Exception as e:
        print 'database error', e.message
    return 'successful'

@app.route('/set_progress', methods = ['POST'])
def set_progress():
    data = request.form
    sid, abstract = data['sid'], data['abstract']
    sql1 = 'update project set project.progress = "%s" where project_id = %d' %(abstract, int(sid))
    body, opt, img, title = data['body'], data['opt'], data['img'], data['title']
    sql2 = 'update progress set progress.body = "%s", progress.img="%s", progress.title="%s" where progress_id = %d' %(body, img, title, int(sid))
    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        cursor.execute(sql1)
        cursor.execute(sql2)
        data = cursor.fetchall()

        if len(data) == 0:
            conn.commit()
            return 'success'
        else:
            return 'database update failed'
    except Exception as e:
        print 'database error', e.message

@app.route('/set_papers', methods = ['POST'])
def set_papers():
    data = request.form
    title, author, link, year = data['title'], data['author'], data['link'], data['year']
    sql = 'insert into article (title, year, link, author) values ("%s", %d, "%s", "%s")' %(title, int(year), link, author)
    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        cursor.execute(sql)
        data = cursor.fetchall()

        if len(data) == 0:
            conn.commit()
            cursor.close()
            return 'success'
        else:
            cursor.close()
            return 'database update failed'
    except Exception as e:
        print 'database error', e.message


@app.route('/set_academic', methods = ['POST'])
def set_academic():
    data = request.form
    cname, cyear, sid, cdetail = data['cname'], data['cyear'], data['sid'], data['cdetail']
    sql = 'update conference set conference.name="%s", conference.year=%d, conference.conference_detail="%s" where conf_id=%d' %(cname, int(cyear), cdetail, int(sid))
    cnews = "<root>" + data['cnews'] + "</root>" # add fake root for XML string
    cnews = cnews.encode("utf8")
    root = xml.etree.ElementTree.fromstring(cnews)
    article = {}
    for tree in root:
        if article.has_key(tree.tag):
            article[tree.tag].append(tree.text)
        else:
            article[tree.tag] = [tree.text]
    # format check should be done by front end
    # assert may failed because of empty content for cnews
    #assert(article.has_key('clink') and article.has_key('ctitle'))
    #assert(len(article['clink']) == len(article['ctitle']))

    del_sql = 'delete from conference_news where conf_id = %d' %(int(sid))
    insert_sql = 'insert into conference_news (conf_id, title, link) values '
    for i in range(len(article['clink'])):
        insert_sql = insert_sql + '(%d, "%s", "%s") ' % (int(sid), article['ctitle'][i], article['clink'][i])
        if i < (len(article['clink']) - 1):
            insert_sql = insert_sql + ','
    if not article.has_key('clink'):
        insert_sql = ''

    try:
        conn = mysql.connect()
        cursor = conn.cursor()
        cursor.execute(sql)
        cursor.execute(del_sql)
        cursor.execute(insert_sql)
        data = cursor.fetchall()

        if len(data) == 0:
            conn.commit()
            return 'success'
        else:
            return 'database update failed'

    except Exception as e:
        print 'database error', e.message

    return 'successful'

if __name__ == '__main__':
    app.run(host='0.0.0.0')
