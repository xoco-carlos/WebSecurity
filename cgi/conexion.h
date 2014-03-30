// Hernandez Padron Jose Carmen
// Autor: Hernandez Padron Jose Carmen
// Colaboradores: Richard, Denise.
#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>
#include <fstream>
#include <cstring>
#include "base.h"
#include "sha1.h"
#include <stdlib.h>
using namespace std;
// Objeto para la conexion de la BD
MYSQL mysql;
// 
getBD objectBD;
// Delcaracion de la clase
class conn{
// Declaramos los metodos
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
//Metodo privado que crea la conexion a la BD
  void conn::conection_sql(){
     mysql_init( &mysql );
     if(mysql_real_connect(&mysql,objectBD.GET_coBD(),objectBD.GET_usBD(),objectBD.GET_psBD(),objectBD.GET_naBD(),0,NULL,0)){
     }else{
       cout<<"conexion fallida, verifique los datos"<<endl;
     }
  }
  // Metodo publico que llama al metodo para la conexion de la BD
  void conn::GET_conection_sql(){
    conection_sql();
  }
  // Metodo para obtener el tiempo de la conexion
  void conn::GET_time(){
    time_t now = time(0);
    char *tiempo = ctime(&now);
  }
  // Metodo para cerrar la conexion 
  void conn::connection_close(){
    mysql_close(&mysql);
  }
  void conn::close(){
    connection_close();
  }
  // Metodo que verifica si existe us y pas dentro de la BD
  void conn::connection_users(char *us,char *pas){
    int flag=0;
    char cadena1[40] = "/uwww/";
    char cadena1[30] = "/uwww/";
    // Creamos la query
    char s1[300]="select userID,name,type from users where password='";
    strcat(s1,pas);
    strcat(s1,"' and name='");
    strcat(s1,us);    
    strcat(s1,"'");
    string str1 = s1;
    const char* string1 = str1.c_str();
    // Hacemos la consulta a la BD
    mysql_real_query(&mysql,string1,strlen(string1));
    MYSQL_RES *Result = mysql_store_result(&mysql);
    MYSQL_ROW row;
    // Verificamos que la consulta si regreso un valor
    while(row = mysql_fetch_row(Result)){
    	
	printf("<body style=\"background:#80BFFF\">");
	// Verificamos que lo que regreso la consulta sea diferente de 0
	if( mysql_num_rows(Result)!=0 ){
		cout << "<h1> Bienvenido " << row[1]<< "</h1>";
		// Guardamos el id y el tipo de usuario en un archivo
                std::string  rest=row[1];
                int i=0;
		int x=rand()%10;
                //Sacamos el SHA1 del nombre
                for(i=0;i<x;i++){
                rest=sha1(rest);}
                const char* rows = rest.c_str();

		strcat(cadena1,rows);		
		ofstream fs(cadena1);
		// Escribimos en el archivo que  nos servi para el inicio de sesion 
	   	fs << row[0]<<"\n"<< row[2]<<"\n"<< rows << endl;
   		fs.close();		 
		flag=1;		
		printf("<script> window.location.href = \"http:%c%cfront.xoco.in%ccontrollers%cloginController.php?token=%s\";</script>",47,47,47,47,rows);

		///strcat(cadena1,row[1]);		
		//ofstream fs(cadena1); 
		// Guardamos el id y el tipo de usuario en un archivo
	   	//fs << row[0]<<"\n"<< row[2] << endl;
   		//fs.close();		 
		// Enviamos la token		
		//flag=1;		
		//printf("<script> window.location.href = \"http:%c%cweb.xoco.in/front/controllers/loginController.php?name=%s\";</script>",47,47,row[1]);
	
			}



    }
	if(flag==0){
		printf("<h1>Usuario o password invalidos.</h1>");
	//Si los datos no son válidos, regresa nuevamente a la vista de registro
		printf("<a href=\"http:%c%cfront.xoco.in/loginView.php\">Regresar<%ca>",47,47,47);
	}
	printf("</body>");
}
// Metodo para la autenticacion de usuarios
void conn::slect(char *us,char *pas){
	connection_users(us,pas);
}
