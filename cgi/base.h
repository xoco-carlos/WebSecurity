//Hernández Padrón José Carmen

#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>
#include <fstream>
#include <cstring>
using std::string;
//Definimos nuestra clase
class getBD{
// Metodos publicos
  public:
    const char *GET_usBD();
    const char *GET_psBD();
    const char *GET_naBD();
    const char *GET_coBD();

};
//Metodo que regresa el nombre del usuario para conexión con la BD
const char  *getBD::GET_usBD(){

        const char  *c="root";
        return c;

        }
//Metodo que regresa el password para conexión con la BD
const char  *getBD::GET_psBD(){


const char  *c="becarios";
return c;


        }
//Metodo que regresa el nombre del la BD para conexión con la BD
const char  *getBD::GET_naBD(){



const char  *c="proyect";
return c;


        }
//Metodo que regresa el host donde se aloja la BD        
const char  *getBD::GET_coBD(){



const char  *c="localhost";
return c;


        }

