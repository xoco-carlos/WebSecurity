#include <iostream>
#include <cstdlib>

int main()
{
/* Es obligatorio decirle al servidor que invocó nuestro programa
qué tipo de información le estamos enviando. En este caso enviamos texto HTML, pero
tenemos la libertad de enviar varios tipos de archivo. */
std::cout<<"Content-type: text/html\n\n";

//Por último enviamos la información, la cual debería mostrar el nombre del servidor.
std::cout<<"<html><head><title>mi primer cgi</title></head><body>mi primer cgi\nServidor: ";
std::cout<<getenv("SERVER_NAME")<<"</body></html>";

return 0;
}
