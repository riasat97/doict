
#Title-Establishment of computer and language training labs in educational institutions across the country project

##Current Government has established 4161 Digital labs all over the country. These labs are called Sheikh Russell digital lab.In these 4161 labs, there are approximately :

>-college=854 -school=2627 -primary=160 -madrasa=392 -technical=128	

**grand total = 4161**
	

Got to this website http://srdl.gq/ to view in web format.
***Use vpn or mobile data if http://srdl.gq/ does not work***


#Api documentation :

###Get all division->district->sub_district under 3-layer dependent items. 	

Requested Url:
```
Get http://srdl.gq/api/area.php?
```
Response Body:
```
{"খুলনা": 
{"কুষ্টিয়া": 
["কুমারখালী","কুষ্টিয়া সদর","খোকসা","দৌলতপুর","ভেড়ামারা","মিরপুর"]
}	
}
```
###Get lab list count under {division} || {district}

Requested url:
```
http://srdl.gq/api/count.php?division=ঢাকা 
```
Response body:
```
{
"status": true,
"message": "850"
}
```
Requested url:
```
http://srdl.gq/api/count.php?district=গাজীপুর
```
Response body: 
```
{
"status": true,
"message": "72"
}
```
###Get lab list count under {sub_district}[using {district}/{sub_district} to get unique lab count as there exists sub_district/thana with the same name].

Requested url:
```
http://srdl.gq/api/count.php?district=গাজীপুর&sub_district=কালিয়াকৈর
```
Response body:
```
{
"status": true,
"message": "11"
}
```
###Get all 4,161 Lab data without using pagination [not recommended]

Requested Url:
```
http://srdl.gq/api/labdata.php?
```
Response Body:
```
{
"status": true,
"message": {
"draw": 1,
"recordsTotal": 4161,
"recordsFiltered": 4161,
"perPage": 1,
"lastPage": 4161,

"data": [
{
"RowNumber": "1",
"id": "4114",
"institution": "অলুয়া ইসলমিয়া আলিম মাদ্রাসা",
"name_mobile": "০১৭২৩-৩০১২৭২",
"year": "2018-19",
"sub_district": "ব্রাহ্মণপাড়া",
"district": "কুমিল্লা",
"division": "চট্টগ্রাম",
"language_lab": ""
}
]
}
}
```
###Get all 4,161 Lab data using pagination. Currently it provides 25 rows per page. Last Page value in response body indicates the no. of total pages.

Requested Url:
```
http://srdl.gq/api/labdata.php?pageno=1
```
Response Body:
```
{
"status": true,
"message": {
"draw": 1,
"recordsTotal": 4161,
"recordsFiltered": 4161,
"perPage": 25,
"lastPage": 167,

"data": [
{
"RowNumber": "1",
"id": "4115",
"institution": "অলুয়া ইসলমিয়া আলিম মাদ্রাসা",
"name_mobile": "০১৭২৩-৩০১২৭২",
"year": "2018-19",
"sub_district": "ব্রাহ্মণপাড়া",
"district": "কুমিল্লা",
"division": "চট্টগ্রাম",
"language_lab": ""
},
]
}
}
```
###Get all lab under {division}/{district}/{sub_district} using pagination. Use this URL to get unique lab list under division->district->sub_district 3-layer dependent items. This prevents sub_district from retrieving lab list with the same sub district/thana name. And only provide specified requested lab list.

Requested Url:
```
http://srdl.gq/api/labdata.php?division=ঢাকা&district=গাজীপুর&sub_district=কালিয়াকৈর&pageno=1
```
Response Body:
```
{
"status": true,
"message": {
"draw": 1,
"recordsTotal": 11,
"recordsFiltered": 11,
"perPage": 1,
"lastPage": 11,

"data": [
{
"RowNumber": "1",
"id": "3259",
"institution": "আক্কেল আলী উচ্চ বিদ্যালয়",
"name_mobile": "মোঃ আতোয়ার রহমান,০১৭১৮-৬১২৪৩৯",
"year": "2017-18",
"sub_district": "কালিয়াকৈর",
"district": "গাজীপুর",
"division": "ঢাকা",
"language_lab": ""
}
]
}
}
```
###Add year= {2015-16} query string after lablist.php? to get requested year lablist under any {division}/{district}/{sub_district}. We have 4 fiscal year and they are: 2015-16,2016-17,2017-18,2018-19.

Requested Url:
```
http://srdl.gq/api/labdata.php?year=2015-16&division=ঢাকা&district=গাজীপুর&sub_district=কালিয়াকৈর&pageno=1
```
Response Body:
```
{
"status": true,
"message": {
"draw": 1,
"recordsTotal": 8,
"recordsFiltered": 8,
"perPage": 1,
"lastPage": 8,

"data": [
{
"RowNumber": "1",
"id": "813",
"institution": "কালিয়াকৈর ডিগ্রী কলেজ",
"name_mobile": "মো: আবদুল হাই ,০১৭১২৫৮৪২৫২",
"year": "2015-16",
"sub_district": "কালিয়াকৈর",
"district": "গাজীপুর",
"division": "ঢাকা",
"language_lab": ""
}
]
}
}
```
###Get lab by id [for single lab details]

Request Url:
```
http://srdl.gq/api/labdata.php?id=1
```
Response body:
```
{
"status": true,
"message": {
"draw": 1,
"recordsTotal": 1,
"recordsFiltered": 1,
"perPage": 1,
"lastPage": 0,

"data": [
{
"RowNumber": "1",
"id": "1",
"institution": "ইকবাল নগর মাধ্যমিক বালিকা বিদ্যালয়",
"name_mobile": "শেখ মোহাম্মাদ আলী,০১৭২৪১৭৯৩০২",
"year": "2015-16",
"sub_district": "খুলনা সদর",
"district": "খুলনা",
"division": "খুলনা",
"language_lab": ""
}
]
}
}
```
#Insturctions [will be updated as per requirement]:

**There are 65 language training labs out of 4161 digital labs. 
Highlight row as language training lab if you find language_lab=”1” in http://srdl.gq/api/labdata.php?{any} url response . That means you will find 65 rows.**

