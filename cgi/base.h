#include <iostream>
#include <fstream>
#include <mysql.h>
#include <string.h>
#include <ctime>
#include <fstream>
#include <cstring>
using std::string;

class getBD{

  public:
    const char *GET_usBD();
    const char *GET_psBD();
    const char *GET_naBD();

};

const char  *getBD::GET_usBD(){

        const char  *c="root";
        return c;

        }

const char  *getBD::GET_psBD(){


const char  *c="becarios";
return c;


        }

const char  *getBD::GET_naBD(){



const char  *c="proyect";
return c;


        }

