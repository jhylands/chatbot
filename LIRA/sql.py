import _mysql

db = _mysql.connect("localhost","root","space(55)","chatbot");
db.query("SELECT * FROM Word ;") 
#new1 is scheme table1 is table mysql 
res= db.store_result()
for i in range(res.num_rows()):
	print(res.fetch_row())
