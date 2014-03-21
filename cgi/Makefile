all: get

get: pcon.cpp
	g++ pcon.cpp -o get.exe -I/usr/include/mysql -L/usr/lib/mysql -lmysqlclient -lstdc++
	
clean:
	rm -rf get.exe
