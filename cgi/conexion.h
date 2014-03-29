#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>
#include <fstream>
#include <cstring>
#include "base.h"
using namespace std;
MYSQL mysql;
getBD objectBD;
class conn{

  public:
    void GET_conection_sql();
    void GET_time();
    void close();
    void slect(char *us,char *pas);
  private:
    void conection_sql();
    void connection_users(char *us,char *pas);
    void connection_close();
};
  void conn::conection_sql(){
     mysql_init( &mysql );
     if(mysql_real_connect(&mysql,objectBD.GET_coBD(),objectBD.GET_usBD(),objectBD.GET_psBD(),objectBD.GET_naBD(),0,NULL,0)){
     }else{
       cout<<"conexion fallida, verifique los datos"<<endl;
     }
  }
  void conn::GET_conection_sql(){
    conection_sql();
  }
  void conn::GET_time(){
    time_t now = time(0);
    char *tiempo = ctime(&now);
  }
  void conn::connection_close(){
    mysql_close(&mysql);
  }
  void conn::close(){
    connection_close();
  }
  void conn::connection_users(char *us,char *pas){
    int flag=0;
    char cadena1[30] = "/uwww/";
    char s1[300]="select userID,name,type from users where password='";
    strcat(s1,pas);
    strcat(s1,"' and name='");
    strcat(s1,us);    
    strcat(s1,"'");
    string str1 = s1;
    const char* string1 = str1.c_str();
    mysql_real_query(&mysql,string1,strlen(string1));
    MYSQL_RES *Result = mysql_store_result(&mysql);
    MYSQL_ROW row;
    while(row = mysql_fetch_row(Result)){
	cout<<"Location: http://web.xoco.in/front/controllers/loginController.php?name="<<row[1];
	printf("<body style=\"background:#80BFFF\">");

	if( mysql_num_rows(Result)!=0 ){
		cout << "<h1> Bienvenido " << row[1]<< "</h1>";
		strcat(cadena1,row[1]);		
		ofstream fs(cadena1); 
	   	fs << row[0]<<"\n"<< row[2] << endl;
   		fs.close();		 
		
		flag=1;		
		printf("<script> window.location.href = \"http:%c%cweb.xoco.in/front/controllers/loginController.php?name=%s\";</script>",47,47,row[1]);
	cout<<"If your browser doesn't forward click the link";
	cout<<"<a href=\"http://web.xoco.in/front/controllers/loginController.php?name="<<row[1]<<"\"/>Click here!!!</a>";
			}
	


    }
	if(flag==0){
		printf("<h1>Usuario o password invalidos.</h1>");
		printf("<a href=\"http:%c%cweb.xoco.in%cfront%cloginView.php\">Regresar<%ca>",47,47,47,47,47,63,47);
	}
	printf("</body>");
}
void conn::slect(char *us,char *pas){
	connection_users(us,pas);
}
