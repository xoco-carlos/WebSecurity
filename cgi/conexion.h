#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>

using namespace std;
MYSQL mysql;
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
     char  nombre[60] = "admin";
     char  pass[60] = "hola123,";
     char  db [60] = "usuarios";


     if(!strcmp(pass,"false") == 1){
       strcpy(pass,"");
     }else{
       strcpy(pass,pass);
     }
    // cout << "Ingresa el nombre de tu base de datos: ";
    // cin >> db;

     mysql_init( &mysql ); 
     if(mysql_real_connect(&mysql,"localhost",nombre,pass,db,0,NULL,0)){
       cout<<"conexion establecida"<<endl;
       //select of db
  //     connection_users();
     }else{
       cout<<"conexion fallida, verifique los datos"<<endl;
       conection_sql();
     }



  }
  //public
  void conn::GET_conection_sql(){
    conection_sql();
  }
  //public
  void conn::GET_time(){
    time_t now = time(0);
    char *tiempo = ctime(&now);
    cout<<"la hora es:"<<tiempo;
  }
  //private
  void conn::connection_close(){
    mysql_close(&mysql);
    cout<<"conexion cerrada";
  }
  //public
  void conn::close(){

    connection_close();
  }
  //private
  void conn::connection_users(char *us,char *pas){
    const char *query = "select * from users";
    mysql_real_query(&mysql,query,strlen(query));
    MYSQL_RES *Result = mysql_store_result(&mysql);
    MYSQL_ROW row;
    ofstream data;
    data.open("usuarios.txt");
    while(row = mysql_fetch_row(Result)){
      cout << us <<" " << pas << " "<<row[1]<<" "<<row[2]<<endl;
	if( (strcmp(us,row[1])==0) && (strcmp(pas,row[2])==0) ){
		cout << "Logeado.";
		}
	
    }
    data.close();
  }
//public
 void conn::slect(char *us,char *pas){
	
        connection_users(us,pas);
        }
