-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: test_portal
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `GothamCity_questions`
--

DROP TABLE IF EXISTS `GothamCity_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GothamCity_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE latin1_general_ci NOT NULL,
  `option1` text COLLATE latin1_general_ci NOT NULL,
  `option2` text COLLATE latin1_general_ci NOT NULL,
  `option3` text COLLATE latin1_general_ci NOT NULL,
  `option4` text COLLATE latin1_general_ci NOT NULL,
  `correct_ans` text COLLATE latin1_general_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `negative_marks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GothamCity_questions`
--

LOCK TABLES `GothamCity_questions` WRITE;
/*!40000 ALTER TABLE `GothamCity_questions` DISABLE KEYS */;
INSERT INTO `GothamCity_questions` VALUES (2,'What is output?\r\n\r\n# include <stdio.h>\r\nvoid print(int arr[])\r\n{\r\n   int n = sizeof(arr)/sizeof(arr[0]);\r\n   int i;\r\n   for (i = 0; i < n; i++)\r\n      printf(\"%d \", arr[i]);\r\n}\r\n \r\nint main()\r\n{\r\n   int arr[] = {1, 2, 3, 4, 5, 6, 7, 8};\r\n   print(arr);\r\n   return 0;\r\n}','1, 2, 3, 4, 5, 6, 7, 8','Compiler Error','1','Run Time Error','option3',3,1),(3,'Consider the following code. The function myStrcat concatenates two strings. It appends all characters of b to end of a. So the expected output is \"Geeks Quiz\". The program compiles fine but produces segmentation fault when run.\r\n#include <stdio.h>\r\n \r\nvoid myStrcat(char *a, char *b)\r\n{\r\n    int m = strlen(a);\r\n    int n = strlen(b);\r\n    int i;\r\n    for (i = 0; i <= n; i++)\r\n       a[m+i]  = b[i];\r\n}\r\n \r\nint main()\r\n{\r\n    char *str1 = \"Geeks \";\r\n    char *str2 = \"Quiz\";\r\n    myStrcat(str1, str2);\r\n    printf(\"%s \", str1);\r\n    return 0;\r\n}','char *str1 = \"Geeks \"; can be changed to char str1[100] = \"Geeks \";','char *str1 = \"Geeks \"; can be changed to char str1[100] = \"Geeks \"; and a line a[m+n-1] = \'\\0\' is added at the end of myStrcat','A line a[m+n-1] = \'\\0\' is added at the end of myStrcat','A line \'a = (char *)malloc(sizeof(char)*(strlen(a) + strlen(b) + 1)) is added at the beginning of myStrcat()','option1',4,2),(4,'#include <stdio.h>\r\nint main()\r\n{\r\n    int i = 5;\r\n    printf(\"%d %d %d\", i++, i++, i++);\r\n    return 0;\r\n}','7 6 5','5 6 7','7 7 7','Compiler Dependent','option4',3,1),(5,'# include <stdio.h>\r\nvoid fun(int x)\r\n{\r\n    x = 30;\r\n}\r\n \r\nint main()\r\n{\r\n  int y = 20;\r\n  fun(y);\r\n  printf(\"%d\", y);\r\n  return 0;\r\n}','30','20','Compile time error','Run Time Error','option2',3,1),(6,'Which of the following is true about return type of functions in C?','Functions can return any type','Functions can return any type except array and functions','Functions can return any type except array and functions','Functions can return any type except array, functions, function pointer and union','option2',3,1),(7,'#include <stdio.h>\r\nint main()\r\n{\r\n  printf(\"%d\", main);  \r\n  return 0;\r\n}','Address of main function','Compiler Error','Runtime Error','Some Random Value','option1',5,1),(8,'# include <stdio.h>\r\nvoid fun(int *ptr)\r\n{\r\n    *ptr = 30;\r\n}\r\n \r\nint main()\r\n{\r\n  int y = 20;\r\n  fun(&y);\r\n  printf(\"%d\", y);\r\n \r\n  return 0;\r\n}','20','30','Compile time error','Run Time Error','option2',3,1),(9,'Which of the following is true about arrays in C.','For every type T, there can be an array of T.','For every type T except void and function type, there can be an array of T.','When an array is passed to a function, C compiler creates a copy of array.','2D arrays are stored in column major form','option2',3,1),(10,'Consider the following three C functions :\r\n[PI] int * g (void) \r\n{ \r\n  int x= 10; \r\n  return (&x); \r\n}  \r\n   \r\n[P2] int * g (void) \r\n{ \r\n  int * px; \r\n  *px= 10; \r\n  return px; \r\n} \r\n   \r\n[P3] int *g (void) \r\n{ \r\n  int *px; \r\n  px = (int *) malloc (sizeof(int)); \r\n  *px= 10; \r\n  return px; \r\n}\r\n\r\nWhich of the above three functions are likely to cause problems with pointers? ','Only P3','Only P1 and P3','Only P1 and P2','P1, P2 and P3','option3',3,1),(11,'Predict the output of the below program:\r\n#include <stdio.h>\r\n#define SIZE(arr) sizeof(arr) / sizeof(*arr);\r\nvoid fun(int* arr, int n)\r\n{\r\n    int i;\r\n    *arr += *(arr + n - 1) += 10;\r\n}\r\n \r\nvoid printArr(int* arr, int n)\r\n{\r\n    int i;\r\n    for(i = 0; i < n; ++i)\r\n        printf(\"%d \", arr[i]);\r\n}\r\n \r\nint main()\r\n{\r\n    int arr[] = {10, 20, 30};\r\n    int size = SIZE(arr);\r\n    fun(arr, size);\r\n    printArr(arr, size);\r\n    return 0;\r\n}','20 30 40','20 20 40','50 20 40','Compile Time Error','option3',5,1),(12,'What is the return type of malloc() or calloc() ?','void *','Pointer of allocated memory type','void**','int*','option1',3,1),(13,'What is the problem with following code?\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    int *p = (int *)malloc(sizeof(int));\r\n \r\n    p = NULL;\r\n \r\n    free(p);\r\n}','Compiler Error: free can\'t be applied on NULL pointer','Memory Leak','Dangling Pointer','The program may crash as free() is called for NULL pointer.','option2',5,1);
/*!40000 ALTER TABLE `GothamCity_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GothamCity_users`
--

DROP TABLE IF EXISTS `GothamCity_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GothamCity_users` (
  `first_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `phone_number` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `questions_attempted` int(11) NOT NULL DEFAULT '0',
  `correct_ans` int(11) NOT NULL DEFAULT '0',
  `wrong_ans` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GothamCity_users`
--

LOCK TABLES `GothamCity_users` WRITE;
/*!40000 ALTER TABLE `GothamCity_users` DISABLE KEYS */;
INSERT INTO `GothamCity_users` VALUES ('mayanka','rew','mayankarew@gmail.com','999999999',4,1,1,0),('mayank','rew','mayanka17re@gmail.com','9671537388',0,0,0,0),('Light','Yagami','lightyagami@gmail.com','1234567891',-2,1,0,1),('L','...','l.mn@gmail.com','5555555555',4,1,1,0),('navneet','verma','navneet@gmail.com','8950683510',3,2,1,1),('Navi','navi','navi@gmail.com','3454253452',0,0,0,0),('Abhik','Setia','abhik@gmail.com','8950354322',-1,1,0,1),('abhik','setia','ggshsb@hhsj','0895022773',3,1,1,0),('awgdkwag','gdakjgwdkj','gdkagw@dkawvdkh','9468468446',-1,1,0,1),('sai','charan','saicharanrachamadugu@ymail.com','8950884197',-12,11,0,11),('anon','ymous','anon8950@gmail.com','9999999999',0,7,2,5),('rushi','nagireddy','nyruhi310@gmail.com','7206305406',3,1,1,0),('Ayush','Gupta','ayushgupta1995@gmail.com','8950048994',-1,1,0,1),('Rimsha','Goomer','rimshaa15@gmail.com','8222000151',0,0,0,0),('sudhir','meena','sureshmeena512@gmail.com','9728430813',3,1,1,0),('sakir','khan','ksakir486@gmail.com','7206304985',-1,1,0,1),('Ayush','gu[ta','wdefgr@fgh.com','67890',-1,1,0,1),('sdf','wdefrg','sfe@dv.com','895004899',5,4,2,2),('R','G','r@g.c','12',11,7,4,3),('detective','1','sehrunhifi@gmail.com','9587716192',6,11,4,7),('sudhir','meena','meenasudhir54@gmail.com','9414986443',11,12,5,7),('nasdfasdg','dfgsdhdf','sdfgsdf@gmail.com','7656787298',0,0,0,0),('adf','dfd','ad@gmail.com','234',4,1,1,0),('Jyoti','Jangra','jjangra2@gmail.com','8053200170',9,12,5,7),('giwgsi','jgkwdgk','kgxjg@gkjebdkj','3264932647',0,0,0,0),('Froade','1','Froade34@einrot.com','9549337718',3,1,1,0),('sk','1','Houn1942@dayrep.com','8058457950',10,11,5,6),('Utkarsh','Kumar','utkarsh578@gmail.com','0805945948',-3,2,0,2),('ajbwdkj','kbdakjwbd','bdakjwbk@BDkjabd','9740917097',-1,1,0,1),('jsbfdalf','faln','alwdlk@ajdj.akhwdok','3469136498',0,0,0,0),('a','a','an0@gmail.com','a',0,0,0,0),('awkgdgaidku','dkjawgk','dgakwj@dmawbmdw','1t341t348',0,0,0,0),('navadasdf','verma','nasdfasd@gmail.com','8784792348',0,0,0,0),('Hello','sfsdf','asfdgasfda@gmail.copm','7429342394',5,12,4,8),('Anirudh','Agarwal','anirudhagarwal73@gmail.com','9050261964',0,0,0,0),('Navnasdfasdfasd','sadfgasdfas','sdfgafdga@gmail.com','3654578654',-1,1,0,1),('nnnnnnmnbvcvbnb','bnbvcdfhjhgfghj','ghgfdfghjgf@gmail.com','5635682436',-1,1,0,1),('mmmasdfq','asmasdmfamsdf','sdfgasdfm@gmail.com','3546786543',0,0,0,0);
/*!40000 ALTER TABLE `GothamCity_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Humbug_questions`
--

DROP TABLE IF EXISTS `Humbug_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Humbug_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correct_ans` text NOT NULL,
  `marks` int(11) NOT NULL,
  `negative_marks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Humbug_questions`
--

LOCK TABLES `Humbug_questions` WRITE;
/*!40000 ALTER TABLE `Humbug_questions` DISABLE KEYS */;
INSERT INTO `Humbug_questions` VALUES (1,'What is the output of the following code :\r\nchar p[20]; \r\nchar *s = \"string\"; \r\nint length = strlen(s); \r\nint i; \r\nfor (i = 0; i < length; i++) \r\np[i] = s[length â€” i]; \r\nprintf(\"%s\", p);\r\n','gnirts ','gnirt','string','no output is printed','option4',3,1),(2,'What would be the output of the following program.\r\n\r\n#include<stdio.h>\r\n#define FOO() ({int retval; retval=(\'a\'+\'A\')*2/324; retval;})\r\nint main()\r\n{\r\n	int d,q,w;\r\n	d=FOO();\r\n	switch(d){\r\n		case 1:	q=d*2;\r\n	 	case 2:	w=d+2;\r\n	 	case 3:	int e;\r\n	 	 	e=d-2;\r\n	 	 	printf(\"%d\\n\",e);\r\n	 	 	break;\r\n	 	default:printf(\"Haha\\n\");\r\n	}\r\n	printf(\"%d %d\\n\",q,w);\r\n	return 0;\r\n}\r\n','1 6 5','Compile Error','1 Garbage Garbage','Haha 6 5','option2',3,1),(3,'What will the output of the following.\r\n\r\n#include<stdio.h>\r\nint a=12,b=13;\r\ng(int a,int b){\r\n	printf(\"%d %d\\n\",a=1,b);\r\n}\r\nf(int a,int b){\r\n	g(a,b=14);	\r\n}\r\n\r\nint main()\r\n{\r\n	f(4,5);\r\n	return 0;\r\n}\r\n','12 14 ','12 13 ','4 5','1 14','option4',3,1),(4,'Write the output of the following program\r\n#define PRINT(int)  printf(#int\"=%d\",int)\r\nmain(){\r\n	int x=2,y=3,z=4;\r\n	PRINT(x+y);\r\n	PRINT(y+z);\r\n	PRINT(z+x);\r\n}\r\n','#int=5#int=7#int=6','576','x+y=5y+z=7z+x=6','x=5y=7z=6','option3',3,1),(5,'What is the output of the following program?\r\n#include<stdio.h>\r\nint main(){\r\n	static int i;\r\n	for(++i||++i;++i;++i&&++i) {printf(\"%d \",i);\r\n			  if(i==5) break;\r\n			  if(i==4) break;\r\n			 }\r\n 	return 0;\r\n}\r\n','2 5','1 3 5 7 9 11 13 ..... infinty','1 3','2 4','option1',3,1),(6,'What is the output of the following program\r\n#include<stdio.h>\r\nint main(){\r\n	char a=250;\r\n	 int expr;\r\n	 expr=printf(\"%d\",a^~a+!a+a++);\r\n	 printf(\"  %d\",expr);\r\n	return 0;\r\n}\r\n','249 3','5 1','-6 3','25 2','option2',3,1),(7,'What is the output of following program? \r\n#include<stdio.h>\r\n\r\nint main(){\r\nint x = -9;\r\n	if( x < sizeof(char)){\r\n		printf(\"Anirudh is Awesome\");\r\n	}else{\r\n		printf(\"Anirudh is Phenomenal\");\r\n	}\r\n	return 0;\r\n}\r\n','Anirudh is Awesome','Anirudh is Phenomenal','Compilation Error','Run-time Error','option2',3,1),(8,'What will be output if you will compile and execute the following c code?\r\nstruct marks{\r\n	 int p:3;\r\n	 int c:3;\r\n	 int m:2;\r\n};\r\nvoid main(){\r\n	 struct marks s={2,-6,5};\r\n	 printf(\"%d %d %d\",s.p,s.c,s.m); \r\n}\r\n','2 -6 5','2 -6 1','2 2 1','None of these','option3',3,1),(9,'What will be output when you will execute following c code?\r\nint main()\r\n{\r\n    union a\r\n    {\r\n        int i;\r\n        char ch[2];\r\n    };\r\n    union a u;\r\n    u.ch[0]=3;\r\n    u.ch[1]=2;\r\n    printf(\"%d, %d, %d\\n\", u.ch[0], u.ch[1], u.i);\r\n    return 0;\r\n}\r\n','3, 2, 515','3,2,159','515,515,4','Compilation Error','option1',3,1),(10,'What will be output if you will compile and execute the following c code?	\r\n\r\n#include<stdio.h>\r\nint main(){\r\n	int ** px;\r\n	int const x=12;\r\n	int * const p=&x;\r\n	*p=sizeof(px)*sizeof(x)*sizeof(p)+sizeof(NULL)+(void*)0;\r\n	printf(\"%d\",x);\r\n	return 0;\r\n}\r\n','12','68','72','Compilation Error','option2',3,1),(11,'Find the output of the following  code.\r\n\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    int i=4, j=8;\r\n    printf(\"%d, %d, %d\\n\", i|j&j|i, i|j&j|i, i^j);\r\n    return 0;\r\n}\r\n','-64, 1, 12','112, 1, 12','32, 1, 12','None of these.','option4',3,1),(12,'Which of the following statement obtains the remainder on dividing 5.5 by 1.3 ?\r\n','rem = (5.5 % 1.3)','rem = modf(5.5, 1.3)','rem = fmod(5.5, 1.3)','Error: we can\'t divide','option3',3,1),(13,'In the following program (myprog) is run from the command line as:\r\nmyprog 1 2 3\r\nWhat will be the output:-\r\nmain(int argc,char *argv[]){\r\n	int i,j=0;\r\n	for(i=0;i<argc;i++)\r\n	j=j+atoi(argv[i]);\r\n	printf(â€œ%dâ€,j);}\r\n','123','6','Error','None of these','option2',3,1),(14,'Find the output of the following:-\r\n#define P printf(\"%d \", -1^~0);\r\n#define M(P) int main()\\\r\n             {\\\r\n                P\\\r\n                unsigned char i = 0x80;\\\r\n    			printf(\"%d\\n\", i<<1);\\\r\n                return 0;\\\r\n             }\r\nM(P)\r\n','-1 80','1 256','0 256','Compilation Error','option3',3,1),(15,'What will be output when you will execute following c code?\r\n#include<stdio.h>\r\nvoid main()\r\n{\r\n	static int a=2,b=4,c=8;\r\n	static int *arr1[2]={&a,&b};\r\n	static int *arr2[2]={&b,&c};\r\n	int* (*arr[2])[2]={&arr1,&arr2};\r\n	 printf(\"%d %d\\t\",*(*arr[0])[1],*(*(**(arr+1)+1))); \r\n}\r\n\r\n','2 4','2 8','4 2','4 8','option4',3,1),(16,'What is the output of the following ?\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    float a=0.7;\r\n    if(a<0.7f)\r\n    	printf(\"%.10f %.10f\\n\",0.7f, a);\r\n    else\r\n    	printf(\"%.5f %.5f\\n\",0.7,a);\r\n    return 0;\r\n}\r\nA) \r\nB) \r\nC) \r\nD) \r\n','0.6999999881 0.6999999881	','0.7000000000 0.6999999881','Compile Error','None of these','option2',3,1),(17,'What would  be the output of the following program.\r\n#include<stdio.h>\r\n\r\nint main()\r\n{\r\n    char huge *near *far *ptr1;\r\n    char near *far *huge *ptr2;\r\n    char far *huge *near *ptr3;\r\n    printf(\"%d, %d, %d\\n\", sizeof(**ptr1), sizeof(ptr2), sizeof(*ptr3));\r\n    return 0;\r\n}','4, 4, 4	','2, 2, 2','2, 8, 4','2, 4, 8','option1',3,1),(18,'What will be output of following c code?\r\n#include<stdio.h>\r\n#define p(a,b) a##b\r\n#define call(x) #x\r\nint main(){\r\n	 do{\r\n		int i=15,j=3;\r\n		printf(\"%d \",p(i-+,+j));\r\n	     }\r\n	 while(*(call(625)+3));\r\n 	return 0;\r\n}\r\n','11 10 9','11','Compilation Error','None of these','option2',3,1),(19,'What is the output of this C code?\r\n# include <stdio.h>\r\nint main( )\r\n{\r\n  static int a[] = {10, 20, 30, 40, 50};\r\n  static int *p[] = {a, a+3, a+4, a+1, a+2};\r\n  int **ptr = p;\r\n  ptr++;\r\n  printf(\"%d%d\", ptr-p, **ptr);\r\n}\r\nA) 100\r\nB) 120 \r\nC) 140\r\nD) 40\r\n','100','120','140','40','option3',3,1),(20,'What is the output of this C code?\r\n#include <stdio.h>\r\n#define mark(a,b)((b) > (a)?(a) : (b))\r\nint main(void) {\r\n	char a;\r\n	int b;\r\n	a=\'a\';\r\n	b=98;\r\n	printf(\"%d\",(int )mark(a,b));\r\n	return 0;\r\n}\r\nWhat would be the output.\r\nA) Compile Error\r\nB) 98\r\nC) Run-time Error\r\nD) 97\r\n','Compile Error','98','Run-time Error','97','option4',3,1);
/*!40000 ALTER TABLE `Humbug_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Humbug_users`
--

DROP TABLE IF EXISTS `Humbug_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Humbug_users` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `questions_attempted` int(11) NOT NULL DEFAULT '0',
  `correct_ans` int(11) NOT NULL DEFAULT '0',
  `wrong_ans` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Humbug_users`
--

LOCK TABLES `Humbug_users` WRITE;
/*!40000 ALTER TABLE `Humbug_users` DISABLE KEYS */;
INSERT INTO `Humbug_users` VALUES ('jayant','deswal','12jayant12@gmail.com','9891940678',0,0,0,0),('vibhanshu','chhangani','1@gmail.com','9672039091',0,0,0,0),('sugam','goyal','1sugamgoyal33@gmail.com','1954169722',24,16,10,6),('Divyanshu','Bishnoi','29dishu@gmail.com','9896840169',0,0,0,0),('Aaditya','Goel','aaditya.goel27@gmail.com','9996999065',0,0,0,0),('dheeraj','kumar','aadm.dheeraj@gmail.com','9896003052',0,0,0,0),('Aakash','Goel','aakashgoel111111@gmail.com','9416965902',18,14,8,6),('Aakash','Goel','aakashgoel11111@gmail.com','9416965901',0,0,0,0),('Aakash','Goel','aakashgoel1111@gmail.com','9416965907',0,0,0,0),('Aakash','Goel','aakashgoel11122211@gmail.com','1231231123',0,0,0,0),('Aakash','Goel','aakashgoel2222@gmail.com','9996649165',0,0,0,0),('aashutosh','joshi','aashutosh786joshi@gmail.com','9728431587',0,0,0,0),('abc','xyz','abc.xyz@gmail.com','9999976895',0,0,0,0),('abc','xyz','abc@gmail.com','8888549672',0,0,0,0),('abhishek','verma','abhiahek21129511@gmail.com','7206540332',15,17,8,9),('abhishek','verma','abhiahek211295@gmail.com','7206540338',0,0,0,0),('abhimanyu','prabhakar','abhimanyuprabhakar931@gmail.co','9728434051',0,0,0,0),('abhimanyu','prabhakar','abhimanyuprabhakar93@gmail.com','9728434050',0,0,0,0),('Abhinandan','Sanduja','abhinandan578@gmail.com','8607451509',0,0,0,0),('abhisek','kalwar','abhishek20531@gmail.com','9728429602',0,16,4,12),('abhishek','verma','abhishek211295@gmail.com','7206540331',0,0,0,0),('Abhishek','Gupta','abhishekgupta.my@gmail.com','8950048971',0,0,0,0),('Abhishek','Jain','abhishekjain1351@gmail.com','9728434789',23,9,8,1),('Abhishek','Singhal','abhisheksinghal0071@gmail.com','9896009942',13,15,7,8),('Abhishek','Singhal','abhisheksinghal007@gmail.com','9896009941',0,0,0,0),('Aditya','Goel','adityagoel1997.ag@gmail.com','9466818897',0,0,0,0),('Aditya','Goel','adityagoel997.ag@gmail.com','9466818896',28,16,11,5),('aditya','kumar','adityakaishav1@gmail.com','1234567890',0,0,0,0),('aditya','k','adityakaishav1@gmail.com123','720638321',0,0,0,0),('aditya','kumar','adityakaishav@gmail.com','7206383124',0,0,0,0),('aditya','kumar','adityakhatri777@gmail.com','7027117727',27,13,10,3),('afaqfaff','asdada','afa@gmail.com','8542132259',0,0,0,0),('abhisek','kalwar','ahishek2053@gmail.com','9728429601',0,0,0,0),('Aikesh','Kumar','aikeshkumar25@gmail.com','9728746913',0,0,0,0),('akash','gupta','akash.vistaar@gmail.com','9896005476',0,0,0,0),('akshay','kumar','akshaydivyansh@gmail.com','7206331889',0,0,0,0),('akshay','naveen','akshayjnvkumar@gmail.com','9728433996',15,17,8,9),('Aman','Chawla','amanchawla121@gmail.com','7404108802',14,14,7,7),('Aman','Chawla','amanchawla12@gmail.com','7404108801',0,0,0,0),('AMAN','RAWAT','amanrawat.2011@gmail.com','8750927789',0,0,0,0),('Aman','Gupta','amanynr1@yahoo.com','8950028541',19,13,8,5),('Aman','Gupta','amanynr@yahoo.com','8950028540',0,0,0,0),('Amit','Goel','amitgoel248@gmail.com','9017909057',0,0,0,0),('Amit','Goel','amitgoel248@gmail.com1','9017909051',32,20,13,7),('Akash','Gupta','anirban.1995@yahoo.com','9034439214',28,16,11,5),('Anirudh','Agarwal','anirudhagarwal73@gmail.com','9050261964',6,2,2,0),('ANJALI','MANOCHA','anjalimanocha30@gmail.com','9802441666',24,20,11,9),('Ankita','Garg','ankita02.garg@gmail.com','9729013220',0,0,0,0),('ankit','agarwal','ankitagr97@gmail.com','9728426044',16,16,8,8),('anupriya','gupta','anupriyagupta9596@gmail.com','7206539267',0,0,0,0),('anu','ratta','anuratta1997@gmail.com','8398929621',2,10,3,7),('Apoorva','Gupta','apoorvagupta6681@gmail.com','8570840126',32,20,13,7),('Apoorva','Gupta','apoorvagupta668@gmail.com','8570840125',0,0,0,0),('Arpit','Bhatnagar','arpit2011@live.com','9711431657',0,0,0,0),('123','123','asd@gmail.com','23565',0,0,0,0),('NAvneet','navneet','asdfgasd@gmail.com','2346545788',4,20,6,14),('Ashish','Yadav','ashishyadav28011@gmail.com','1234567891',22,18,10,8),('Ashish','Yadav','ashishyadav2801@gmail.com','8398959625',0,0,0,0),('atul','kumar','atul.kumar@gmail.com','9419698765',30,18,12,6),('aditya','kumar','avneeshyadavssd@gmail.com','1253641621',0,0,0,0),('Ayush','Raj','ayushraj2311@gmail.com','9717500910',0,0,0,0),('Siddharth','Bamal','bamal.siddharth@gmail.com','7404278065',0,0,0,0),('madhur','bansal','bansalmad2101@gmail.com','7206773606',0,0,0,0),('madhur','bansal','bansalmad2102@gmail.com','7206773608',23,13,9,4),('madhur','bansal','bansalmad210@gmail.com','7206773605',0,0,0,0),('bharat','maan','bharat@techspardha.org','7206549590',0,0,0,0),('CHARCHIKA','BANSAL','charchikabansal.cb@gmail.com','9996556168',0,0,0,0),('Shubham','Chawla','chawlashubham007@gmail.com','9896129961',0,0,0,0),('Chhavi','Agarwal','chhavi.agarwal2208@gmail.com','7206814517',3,1,1,0),('CHIRAG','RANKA','chiragkumarrankaa1@gmail.com','7206383271',24,12,9,3),('CHIRAG','RANKA','chiragkumarrankaa@gmail.com','7206383270',0,0,0,0),('Chirag','Mittal','chiragmittal97@yahoo.co.in','8569894432',0,0,0,0),('Chitresh','Madan','chitreshmadan1919@gmail.com','8901392597',29,19,12,7),('ANKUR','GOYAL','coolankur33@gmail.com','9992188767',0,0,0,0),('rohitha','dantuluri','dantulurirohitha@gmail.com','9728431323',0,0,0,0),('Chirag','dawra','dawra19971@gmail.com','8816811819',-4,20,4,16),('chirag','dawra','dawra1997@gmail.com','8816811816',0,0,0,0),('ankit','agarwal','deepakjain175@gmail.com','8875335681',16,16,8,8),('yuvansh','deepak','deepatidar221@gmail.com','8950155311',31,17,12,5),('yuvansh','deepak','deepatidar22@gmail.com','8950155319',0,0,0,0),('DHANVI','BANSAL','dhanvibansal@gmail.com','9034605561',0,0,0,0),('dinesh','choudhary','dinyajatboy1@gmail.com','7206306601',18,14,8,6),('dinesh','choudhary','dinyajatboy2@gmail.com','7206306602',18,14,8,6),('dinesh','choudhary','dinyajatboy@gmail.com','7206306609',0,0,0,0),('divya','bardiya','divyabardiya77@gmail.com','9896020175',0,0,0,0),('Divyanka','Malik','dm1710.hsr1@gmail.com','9729375346',20,16,9,7),('Divyanka`','Malik','dm1710.hsr@gmail.com','9729375345',0,0,0,0),('DEEPAK','DOGRA','dogradeepak730@gmail.com','9728430384',0,0,0,0),('Dravin','Verma','dravinv@gmail.com','8950566827',0,0,0,0),('Dravin','Verma','dravinvermas@gmail.com','8950566820',0,0,0,0),('devilal','bishnoi','drbishnoi94@gmail.com','8814891151',16,8,6,2),('new','ddd','ds425610@gmail.com','8447112143',0,0,0,0),('Shiv','Dayal','dshivdayal@gmail.com','8689030361',0,0,0,0),('Akshat1','Trivedi','electrical.nitkkr@gmail.com','7275539276',0,0,0,0),('gagan','preet','gaganpreetkaur995@gmail.com','9812588121',0,0,0,0),('rohit','prit','georz4prit1@gmail.com','8950444681',16,12,7,5),('rohit','prit','georz4prit@gmail.com','8950444689',0,0,0,0),('GHULAM MOINUL','QUADIR','ghulam6686@gmail.com','8816020237',20,16,9,7),('rajat','goel','goelrajat.rajat4@gmail.com','9729013311',0,0,0,0),('Abc','Xyz','google.com@gmail.com','9876543210',-1,1,0,1),('Harish','Saini','harishsaini.lajak1@gmail.com','9729013122',0,0,0,0),('Harish','Saini','harishsaini.lajak2@gmail.com','9729013123',5,11,4,7),('Harish','Saini','harishsaini.lajak@gmail.com','9729013121',5,11,4,7),('Himanshu','Bansal','Himanshubansal331996@gmail.com','7206815041',0,0,0,0),('Himanshu','Raj','himanshurajapollo11@gmail.com','9728428164',0,0,0,0),('Himanshu','Kumar','hkumar9696.abc@gmail.com','8607420458',0,0,0,0),('sheetal','sachdeva','i171294@gmail.com','9254288358',0,0,0,0),('isha','arora','ishaa3961@gmail.com','1',0,0,0,0),('isha','arora','ishaa3962@gmail.com','8570088111',18,14,8,6),('isha','arora','ishaa396@gmail.com','8570088155',0,0,0,0),('gseg waste hai','ifgwse','iueiuwgfi@iqdgi','2478358435',-2,2,0,2),('Jagriti','Sikka','jagriti2951@gmail.com','7876312992',30,18,12,6),('Jagriti','Sikka','jagriti295@gmail.com','7876312991',0,0,0,0),('Ankit','Jain','jainankit1997@yahoo.co.in','9871680848',0,0,0,0),('abvshdjfv','shdbfvjhsa','jszfkjnsd@gmail.com','8856251458',0,0,0,0),('jyotsna','munjal','jyotsnamunjal9@gmail.com','7404057134',0,0,0,0),('Kumar','Swapnil','k.swapnil341@yahoo.com','7404663861',0,20,5,15),('Kumar','Swapnil','k.swapnil34@yahoo.com','7404663867',0,0,0,0),('Kalpana','Gholia','kalpanagholia1@gmail.com','9468007542',9,11,5,6),('Kalpana','Gholia','kalpanagholia@gmail.com','9468007541',0,0,0,0),('karan','sharma','karansharma232ds@gmail.com','7404658729',0,0,0,0),('KASHISH','BANSAL','kashishbansal08@gmail.com','9728433988',0,0,0,0),('aditya','kumar','kaushikmayank71@gmail.com','8570097664',0,0,0,0),('navneet','verma','kislaya.sharma@gmail.com','9953649406',0,0,0,0),('Amit','kumar','kmr.ammit@gmail.com','9896492711',0,0,0,0),('jyoti','kukreja','kukrejajyoti1997@gmail.com','8950173250',0,0,0,0),('Anshu','kumar','kumaranshu721@gmail.com','9728430542',24,20,11,9),('Anshu','Kumar','kumaranshu72@gmail.com','9728430541',0,0,0,0),('Aditi','Mukesh','kumarm6961@gmail.com','9728427151',9,11,5,6),('Aditi','Mukesh','kumarm696@gmail.com','9728427153',0,0,0,0),('VARUN','MEHTA','KUMARSATYENDER887@GMAIL.COM','9729012449',13,15,7,8),('yogesh','kumar','kyogesh031@gmail.com','9728408906',16,8,6,2),('Lakshay','Hurria','lakshay1239@gmail.com','8950280029',12,16,7,9),('Lakshay','Gupta','lakshaygupta17011@gmail.com','9996779982',28,16,11,5),('Lakshay','Gupta','lakshaygupta1701@gmail.com','9996779981',0,0,0,0),('rahul','mahawar','mahawarrahul51@gmail.com','9728434495',0,0,0,0),('Anshul','Malik','malikanshul29@gmail.com','9050563712',0,0,0,0),('Manisha','Jagga','manisha.jagga95@gmail.com','8950460660',23,13,9,4),('yogesh','badbaria','manishghk@gmail.com','9728429051',0,0,0,0),('Manjeet','Singh','manjeet12saini@gmail.com','7404566708',2,6,2,4),('Shivam','Sharma','manujaudit@gmail.com','7206214252',12,12,6,6),('mohini','agrawal','mohini11mohini@gmail.com','8683922468',0,0,0,0),('Mohit','Singh','mohitgroha@gmail.com','9034398535',0,0,0,0),('nitin','rathodiya','n1itin.1996.rathodiya@gmail.co','9636568601',0,0,0,0),('Nihal','Agarwal','nihal.agarwal2921@gmail.com','9728431261',13,11,6,5),('Nihal','Agarwal','nihal.agarwal292@gmail.com','9728431266',0,0,0,0),('nitin','rathodiya','nitin.1996.rathodiya@gmail.com','9636568600',0,0,0,0),('NEERAJ','KUMAR','nk.nitneerajkumar991@gmail.com','7206307341',0,0,0,0),('NEERAJ','KUMAR','nk.nitneerajkumar992@gmail.com','7206307342',0,0,0,0),('NEERAJ','KUMAR','nk.nitneerajkumar993@gmail.com','7206307343',7,13,5,8),('NEERAJ','KUMAR','nk.nitneerajkumar99@gmail.com','7206307347',0,0,0,0),('Ashish','Yadav','nk085197@gmail.com','9728430045',22,18,10,8),('NARENDRA','DEVAGE','nkkumawat01@gmail.com','9660729582',0,0,0,0),('NARENDRA','DEVAGE','nkkumawat02@gmail.com','9660729584',11,13,6,7),('NARENDRA','DEVAGE','nkkumawat0@gmail.com','9660729583',0,0,0,0),('pankaj','malik','pankajmoo07@gmail.com','8930586344',0,0,0,0),('pankaj','malik','pankajmoo07@gmail.com1','8930586341',8,20,7,13),('Pawandeep','Sethi','pawandeep20071@gmail.com','9717271012',4,16,5,11),('Pawandeep','Sethi','pawandeep2007@gmail.com','9717271011',0,0,0,0),('Pawan','Kumar','pawankherki1@gmail.com','8396900231',26,18,11,7),('PAWAN','KUMAR','pawankherki@gmail.com','8396900237',0,0,0,0),('Priyanka','Dogra','pdogra66@gmail.com','9418510244',0,0,0,0),('PRIYANKA','MEENA','pinkybagadi285@gmail.com','8295185003',0,0,0,0),('purnima','madan','pm07860@gmail.com','7357160409',0,0,0,0),('prachi','kumar','prachi11807@gmail.com','9729114166',1,11,3,8),('Pransh','Tiwari','pransh7575@gmail.com','7206555179',0,0,0,0),('Pratik','Sodani','prasodani@gmail.com','9034439240',0,0,0,0),('pritam','sankadiya','pritamsnkadiya@gmail.com','9138104484',-6,14,2,12),('Pradeep','Gehlot','psgehlot7988@gmail.com','7404220389',0,0,0,0),('Rachit Bansal','Bansal','rachibansal26031@mail.com','7206540611',9,11,5,6),('Rachit','Aeran','rachit2705@gmail.com','9728452787',0,0,0,0),('Rachit Bansal, Ravi Raj','bansal','rachitbansal2603@gmail.com','8950443228',0,0,0,0),('Rahul','Sharma','rahulsharma@gmail.com','9874563210',0,0,0,0),('Rajat, Goutam','Budhiraja','rajatbudhiraja40@gmail.com','7206113103',31,17,12,5),('RAJAT','GOEL','rajatgoel23@gmail.com','9896016951',0,0,0,0),('Rajiv','Kumar','rajiv8498@gmail.com','8683916148',0,0,0,0),('manish','rathi','rathimanish811@yahoo.in','9466694541',4,8,3,5),('manish','rathi','rathimanish81@yahoo.in','9466694546',0,0,0,0),('Pankaj','Rawat','rawatpankaj704@gmail.com','9015414182',0,0,0,0),('RISHABH','AGGARWAL','rishabhaggarwal10011@gmail.com','9050303799',16,16,8,8),('RISHABH','AGGARWAL','rishabhaggarwal1001@gmail.com','8950613356',0,0,0,0),('Rishita','Jaggi','rishitajaggi1@gmail.com','9416042431',11,13,6,7),('Rishita','Jaggi','rishitajaggi@gmail.com','9416042437',0,0,0,0),('Riya','Maan','riyamaan.aqua@gmail.com','8221035086',0,0,0,0),('Rujhan','Arora','rjarora785785@gmail.com','8929047168',0,0,0,0),('Ankit','Sharma','rnankit20@gmail.com','9896002712',0,0,0,0),('Pulkit','Garg','root89501@gmail.com','8950857926',36,12,12,0),('Pulkit','Garg','root8950@gmail.com','8950857927',0,0,0,0),('Rujhan','Arora','rujhanarora.967@gmail.com','8571086068',16,16,8,8),('Rujhan','Arora','rujhanarora.96@gmail.com','8571086069',0,0,0,0),('Sahil','Singla','sahil.0701971@gmail.com','7206329881',8,8,4,4),('Sahil','Singla','sahil.070197@gmail.com','7206329889',0,0,0,0),('Sanil','Chugh','sanilchugh05@gmail.com','7404662843',-4,8,1,7),('Saumye','Malhotra','saumyemalhotra94@gmail.com','7206584122',0,0,0,0),('Sekhar','khush kar diya bhai!!','sekhar.2193@gmail.com','9896672725',0,0,0,0),('Satwant','Kaur','sept1mannu@gmail.com','8295110396',0,0,0,0),('shakti','Pandey','shakti1996raj1@gmail.com','9728431518',32,16,12,4),('shakti','Pandey','shakti1996raj@gmail.com','9728431516',0,0,0,0),('deepak','dogra','sharmadogo12319@gmail.com','9467181996',0,0,0,0),('Shivam','Sharma','sharmashivam0530@gmail.com','7206214251',0,0,0,0),('shivam','wadhwa','shivamwadhwa22000@gmail.com','9034722000',5,11,4,7),('Shivang','Bansal','shivangbansal400@gmail.com','8950115400',0,0,0,0),('Shubham','Shaw','shubhamshaw1529@gmail.com','9034118022',0,0,0,0),('diwa','shukla','shuklapkdkr@gmail.com','8607861247',0,0,0,0),('vijay123','singh','singh96218@gmail.com','1231231231',23,17,10,7),('Apoorva','gupta','singhashpinder9@gmail.com','8950616031',0,0,0,0),('Harender','Singh','singhharry.hs04@gmail.com','8930966185',13,15,7,8),('Manpreet','singh','singhmanee12@gmail.com','9728427032',0,0,0,0),('neha','singla','singla.neha1998@gmail.com','7404221321',2,10,3,7),('Abdul','Rasheed','sk.abdulrasheed98@gmail.com','9100690056',0,0,0,0),('Snehil','Dahiya','snehil.dahiya7@gmail.com','8901491108',0,0,0,0),('sugam','goyal','sugamgoyal33@gmail.com','9541697222',0,0,0,0),('Surbhi','anand','surbhianand2319941@gmail.com','9034467681',0,0,0,0),('Surbhi','anand','surbhianand231994@gmail.com','9034467686',38,18,14,4),('Taqui','Haider','taqihaider4@gmail.com','9728432447',12,12,6,6),('shikhar','verma','theshikhar3@gmail.com','7404658676',0,0,0,0),('Akshat','Trivedi','trivediakshat340@gmail.com','9896018063',0,0,0,0),('Utkarsh','Kumar','u@gmail.com','1232145655',0,0,0,0),('Utkarsh','Agarwal','utkarsh.nitk747@gmail.com','9896003794',0,0,0,0),('Utkarsh','Agarwal','utkarsh.nitk74@gmail.com','9896003793',16,20,9,11),('Vaibhav','Bhatia','vaibhav.bhatia961@gmail.com','8059566381',17,15,8,7),('Vaibhav','Bhatia','vaibhav.bhatia96@gmail.com','8059566384',0,0,0,0),('vardaan','popli','vardaan31196@gmail.com','9728431139',7,17,6,11),('VARUN','MEHTA','varunmehta1997@gmail.com','9729012443',0,0,0,0),('Navneet','Verma','vermanavneet003@gmail.com','0895068351',6,2,2,0),('vibhanshu','chhangani','vibhanshuchhangani@gmail.com','9728434278',0,0,0,0),('VIJAY','SINGH','vijay96218@gmail.com','8295330854',0,0,0,0),('vijay','kumar','vijaykumarvijay8861@gmail.com','8683837791',5,11,4,7),('vijay','kumar','vijaykumarvijay886@gmail.com','8683837790',0,0,0,0),('vikrant','yadav','viki.sid19@gmail.com','8950204648',25,15,10,5),('vineet','agrahari','vineetagrahari77@gmail.com','7206305473',0,0,0,0),('Vishal','Thakuria','vishalthakuria01@gmail.com','7404663182',26,14,10,4),('Vishal','Thakuria','vishalthakuria0@gmail.com','7404663183',0,0,0,0),('Vishal','Thakuria','vishalthakuriya900@gmail.com','9201657659',0,0,0,0),('Vishwas','Gupta','vishwas2941@gmail.com','9729906739',11,13,6,7),('Vishwas','Gupta','vishwas294@gmail.com','9729906738',0,0,0,0),('Vivek','Sharma','vivek1606sharma@gmail.com','7206814193',0,0,0,0),('xyz','abc','xyzabc@gmail.com','9856321470',0,0,0,0);
/*!40000 ALTER TABLE `Humbug_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `confirm_rights` int(2) NOT NULL DEFAULT '0' COMMENT 'set this to 1 for admin rights',
  `password` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `phone_number` varchar(13) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `first_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`phone_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('abhik',1,'a8b8e8c835f795e5e330d12ad96a34ab26462321a6a8ebd6f38507f08348ca6d','8950227738','abhiksetia@gmail.com','abhik','setia'),('adil',0,'2765aea3b3aaad3169e78f009434d6fb1511c3cd3a9c3db3703bc3dd9a241647','8888888888','adilarafat@gmail.com','adil','arafat');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `test_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `event_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`test_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES ('GothamCity','abhik','2016-02-21 12:00:00','2016-03-01 12:00:00','2016-02-12',30),('Humbug','abhik','2016-02-23 12:00:00','2016-02-25 12:00:00','2016-02-24',45);
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-24 13:28:44
