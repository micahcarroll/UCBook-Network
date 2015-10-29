from lxml import html
import requests

COURSES_URL='http://osoc.berkeley.edu/OSOC/osoc?p_term=SP&p_list_all=Y'

 # 1 2 or 3?
url = COURSES_URL
page = requests.get(url)
html_tree = html.fromstring(page.text)
raw_list = html_tree.xpath('//tr[td[3]/label/text()]/td/label/text()')

lst = []
for x in range(len(raw_list)):
    if x % 3 == 0: #currently pointing at a department
        # Purify Course number
        department = raw_list[x]
        course = raw_list[x + 1][3:]

        lst.append('<option value="' + department + ' ' + course + '">')

"""
count = 0
for x in lst:
    print(count, x)
    count += 1
"""

for ele in lst:
    print(ele)

f=open('html_list.txt','w')
for ele in lst:
    f.write(ele+'\n')

f.close()



"""
count = 0
for x in range(len(course_code)):
    print(count, "  ", course_code[x])
    count +=1
"""

"""
GET A DICT {"DEP" : [[1A, 'shit and stuff'], [1B, 'learn to jump']]}

dic = {}
for x in range(len(raw_list)):
    if x % 3 == 0: #currently pointing at a department
        # Purify Course number
        course = raw_list[x + 1][3:]
        course_name = raw_list[x + 2]

        if raw_list[x] not in dic.keys():
            dic[raw_list[x]] = [[course, course_name]]

        else:
            dic[raw_list[x]].append([course, course_name])

print(dic)
"""
