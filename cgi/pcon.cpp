#include"conexion.h"
#include <stdio.h>   
#include<stdlib.h>   
#include<malloc.h>   
#include <string.h>
#include <assert.h>
#include <iostream>
#include <fstream>
using namespace std;
conn object;

int main(){
  int i=0;
  char *info;
  const char *cadena;
  double longitud=100;
  char *token;
  char *us,*sus; 
  char *ps,*sps;
  int flag=0;

//system("tex");
  // ofstream fs("/uwww/nsss.txt"); 

   // Enviamos una cadena al fichero de salida:
  // fs << "Hola, mundo" << endl;
   // Cerrar el fichero, 
   // para luego poder abrirlo para lectura:
//   fs.close();

//printf("Content-Type: application/x-httpd-php");
printf("Content-Type: text/html\n\n");
//printf("<head> ");
//printf("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> "); 
//printf("</head>"); 
 
 info=(char*)malloc(sizeof(char)*1000);
 cadena=getenv("CONTENT_LENGTH");
 longitud=strtod(cadena,NULL);

 for(i=0;i<longitud;i++)
 { 
  fscanf(stdin,"%c",&info[i]);  
    
  }

  i=longitud;
  info[i]='\0';
  //printf("%d\n%s",i,info);

/// 
 token = strtok(info , "&");  
 us=token;      

  while (token != NULL){
                
                token = strtok(NULL,"&");
		ps=token;
		break;
        }
if(strlen(us)>5 && strlen(ps)>5){
//printf("%s\n",ps);
token = strtok(us , "="); 
sus=token;
 while (token != NULL){
                
                token = strtok(NULL,"=");
                us=token;
                break;
        }
//printf("%s\n",us);


token = strtok(ps , "=");  
sps=token;
 while (us != NULL){
                

                token = strtok(NULL,"=");
                ps=token;
                break;
        }
//printf("%s\n",ps);

if((strchr( us, '%' ))!=NULL || (strchr( us, '\'' ))!=NULL || (strchr( ps, '\'' ))!=NULL ){
flag=1;
}


}
else{
flag=1;
}
  object.GET_conection_sql();
//printf("ssssnes\n");
  object.GET_time();

if((flag==0 && strcmp(sus,"user")==0)&&(strcmp(sps,"pass")==0)&& us!=NULL && ps!=NULL){
   object.slect(us,ps);
   }

else{
 printf("<h1>No has ingresado datos en usuario o en password.</h1>");
 printf("<button>");
 printf(" <A HREF=\"http:%c%cweb.xoco.in%ccgi\">Regresar<%cA>",47,47,47,47);
 printf("</button>");

}
  object.close();
  
}




