#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>
#include <fstream>
#include<cstring>
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
  //private
  void conn::conection_sql(){
  /*   char  nombre[60] = "root";
     char  pass[60] = "becarios";
     char  db [60] = "proyecto";
printf("entro");

     if(!strcmp(pass,"false") == 1){
       strcpy(pass,"");
     }else{
       strcpy(pass,pass);
     }
     */
     //cout << "Ingresa el nombre de tu base de datos: ";
    // cin >> db;

     mysql_init( &mysql );
    // cout << "entro de nuevooooo"; 
     if(mysql_real_connect(&mysql,"localhost",objectBD.GET_usBD(),objectBD.GET_psBD(),objectBD.GET_naBD(),0,NULL,0)){
      // cout<<"conexion establecida"<<endl;
       //select of db
  //     connection_users();
     }else{
       cout<<"conexion fallida, verifique los datos"<<endl;
       //conection_sql();
     }



  }
  //public
  void conn::GET_conection_sql(){
//printf("priemro\n");
    conection_sql();
//printf("segundo\n");
  }
  //public
  void conn::GET_time(){
    time_t now = time(0);
    char *tiempo = ctime(&now);
    //cout<<"la hora es:"<<tiempo;
  }
  //private
  void conn::connection_close(){
    mysql_close(&mysql);
    //cout<<"conexion cerrada";
  }
  //public
  void conn::close(){

    connection_close();
  }
  //private
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
   // string str2 = str1;
//    str2 += pas;
//    const char* string1 = str1.c_str();
//printf("%s",string1);
  //  const char *query ="select id,name,password,tip_user from users";
    mysql_real_query(&mysql,string1,strlen(string1));
    MYSQL_RES *Result = mysql_store_result(&mysql);
    MYSQL_ROW row;
    //ofstream data;
    //data.open("usuarios.txt");
//	cout << mysql_num_rows(Result) << "Numerosss";
    while(row = mysql_fetch_row(Result)){
  //    cout << us <<" " << pas << " "<<row[1]<<" "<<row[2]<<endl;
	printf("<body style=\"background:#80BFFF\">");

	if( mysql_num_rows(Result)!=0 ){
		cout << "<h1> Bienvenido " << row[1]<< "</h1>";
		strcat(cadena1,row[1]);		
		ofstream fs(cadena1); 

   // Enviamos una cadena al fichero de salida:
	   	fs << row[0]<<"\n"<< row[2] << endl;
   // Cerrar el fichero, 
   // para luego poder abrirlo para lectura:
   		fs.close();		 
		
		flag=1;		
		printf("<script> window.location.href = \"http:%c%cweb.xoco.in/front/controllers/loginController.php?name=%s\";</script>",47,47,row[1]);

		/*printf("<button>");
	  	
		 printf("<A HREF=\"http:%c%cweb.xoco.in%ccgi%cses.php%cid=%s\">Continuar<%cA>",47,47,47,47,63,row[0],47);
		printf("</button>");*/
		//printf("<FORM METHOD=POST ACTION=\"../front/controllers/loginController.php\">");
		//printf("<input type=\"hidden\" name=\"id\" value=\"%s\">",row[0]);
		//printf("<input type=\"hidden\" name=\"name\" value=\"%s\">",row[1]);
		//printf("<INPUT type=\"submit\" value=\"Enviar\">   </FORM>   ");
		//std::cout << row[0];
		//fprintf(stdout, "Afuerzaz");
			}
	


    }
	if(flag==0){
	
	printf("<h1>Usuario o password invalidos.</h1>");
//	printf("%s",string1);
	printf("<button>");
	//printf("<A HREF=\"http:%c%cweb.xoco.in%ccgi\">Regresar<%cA>",47,47,47,47,63,47);
	printf("<A HREF=\"http:%c%cweb.xoco.in%cfront%cloginView.php\">Regresar<%cA>",47,47,47,47,47,63,47);
	printf("</button>");

}
printf("</body>");
   // data.close();
  }
//public
 void conn::slect(char *us,char *pas){
	
        connection_users(us,pas);
        }
