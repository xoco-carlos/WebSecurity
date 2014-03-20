#include"conexion.h"
#include <stdio.h>   
#include<stdlib.h>   
#include<malloc.h>   
#include <string.h>
#include <assert.h>
conn object;

int main(){
  int i=0;
  char *info;
  const char *cadena;
  double longitud=100;
char *token;

char *us;
char *ps;
  printf("Content-Type: text/plain;charset=us-ascii\n\n");

 info=(char*)malloc(sizeof(char));
 cadena=getenv("CONTENT_LENGTH");
 longitud=strtod(cadena,NULL);

 for(i=0;i<longitud;i++)
 { 
  fscanf(stdin,"%c",&info[i]);  
    
  }

  i=longitud;
  info[i]='\0';
  printf("%d\n%s",i,info);

//// 
 token = strtok(info , "&");  
 us=token;      

  while (token != NULL){
                
                token = strtok(NULL,"&");
		ps=token;
		break;
        }


token = strtok(us , "="); 

 while (token != NULL){
                
                token = strtok(NULL,"=");
                us=token;
                break;
        }


printf("El token es uss:  %s\n", us);

token = strtok(ps , "=");  

 while (us != NULL){
                

                token = strtok(NULL,"=");
                ps=token;
                break;
        }
printf("El token es pds:  %s\n", ps);




  object.GET_conection_sql();
  object.GET_time();
  object.slect(us,ps);
  object.close();
  
}


