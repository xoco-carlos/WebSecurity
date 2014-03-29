//Hernandez Padron Jose Carmen

#include "conexion.h"
#include <stdio.h>   
#include <stdlib.h>   
#include <malloc.h>   
#include <string.h>
#include <assert.h>
#include <iostream>
#include <fstream>
using namespace std;
// Creamos un objeto para la conexion de la BD
conn object;
// main principal
int main(){
//Declaracion de variables	
  int i=0;
  char *info;
  const char *cadena;
  double longitud=100;
  char *token;
  char *us,*sus; 
  char *ps,*sps;
  int flag=0;
  // Cabecera del contenido HTML
	printf("Content-Type: text/html\n\n");
 	info=(char*)malloc(sizeof(char)*1000);
 	cadena=getenv("CONTENT_LENGTH"); // Obtenemos el user y pass por el metodo POST
 	longitud=strtod(cadena,NULL); // Tamano de lo que recibimos por POST
	//Guardamos en una cadena lo que recibimos por POST
	for(i=0;i<longitud;i++){ 
		fscanf(stdin,"%c",&info[i]);  
	}

	i=longitud;
	info[i]='\0';
	// Parseamos la cadena para separar los campos de user y pass
	token = strtok(info , "&");  
	us=token;      
	while (token != NULL){
		token = strtok(NULL,"&");
		ps=token;
		break;
	}
	// Verificamos que los campos de user y pass no esten vacios
	if(strlen(us)>5 && strlen(ps)>5){
		//Obtenemos el contenido de user
		token = strtok(us , "="); 
		sus=token;
		while (token != NULL){
			token = strtok(NULL,"=");
			us=token;
			break;
		}
		//Obtenemos el conetenido de pass
		token = strtok(ps , "=");  
		sps=token;
 		while (us != NULL){
			token = strtok(NULL,"=");
			ps=token;
			break;
		}
		// Verificamos que no se inserto codigo sql en user o pass
		if((strchr( us, '%' ))!=NULL || (strchr( us, '\'' ))!=NULL || (strchr( ps, '\'' ))!=NULL ){
			flag=1;
		}
	}
	else{
		flag=1;
	}
	// Nos conectamos a la BD
	object.GET_conection_sql();
	object.GET_time();
	// Verificamos que si se leyeron los campos user y pass
	if((flag==0 && strcmp(sus,"user")==0)&&(strcmp(sps,"pass")==0)&& us!=NULL && ps!=NULL){
		object.slect(us,ps);
   }
	else{
		printf("<h1>No has ingresado datos en usuario o en password.</h1>");
 		printf("<a href=\"http:%c%cweb.xoco.in%cfront%cloginView.php\">Regresar<%ca>",47,47,47,47,47);
	}
	//Cerramos la conexion a la BD
  object.close();
  
}
