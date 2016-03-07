-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2016 at 02:25 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9092338_nittest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES('abhik', 1, '55f0ea0516d50f793ab4d9aef0bd437ffd15bc4ec48d2e38cbde214a48d5c2cf', '8950227738', 'abhiksetia@gmail.com', 'abhik', 'setia');
INSERT INTO `admin` VALUES('adil', 0, '2765aea3b3aaad3169e78f009434d6fb1511c3cd3a9c3db3703bc3dd9a241647', '8888888888', 'adilarafat@gmail.com', 'adil', 'arafat');

-- --------------------------------------------------------

--
-- Table structure for table `Excalibur_questions`
--

CREATE TABLE `Excalibur_questions` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Excalibur_questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `Excalibur_users`
--

CREATE TABLE `Excalibur_users` (
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

--
-- Dumping data for table `Excalibur_users`
--


-- --------------------------------------------------------

--
-- Table structure for table `GothamCity_questions`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `GothamCity_questions`
--

INSERT INTO `GothamCity_questions` VALUES(2, 'What is output?\r\n\r\n# include <stdio.h>\r\nvoid print(int arr[])\r\n{\r\n   int n = sizeof(arr)/sizeof(arr[0]);\r\n   int i;\r\n   for (i = 0; i < n; i++)\r\n      printf("%d ", arr[i]);\r\n}\r\n \r\nint main()\r\n{\r\n   int arr[] = {1, 2, 3, 4, 5, 6, 7, 8};\r\n   print(arr);\r\n   return 0;\r\n}', '1, 2, 3, 4, 5, 6, 7, 8', 'Compiler Error', '1', 'Run Time Error', 'option3', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(3, 'Consider the following code. The function myStrcat concatenates two strings. It appends all characters of b to end of a. So the expected output is "Geeks Quiz". The program compiles fine but produces segmentation fault when run.\r\n#include <stdio.h>\r\n \r\nvoid myStrcat(char *a, char *b)\r\n{\r\n    int m = strlen(a);\r\n    int n = strlen(b);\r\n    int i;\r\n    for (i = 0; i <= n; i++)\r\n       a[m+i]  = b[i];\r\n}\r\n \r\nint main()\r\n{\r\n    char *str1 = "Geeks ";\r\n    char *str2 = "Quiz";\r\n    myStrcat(str1, str2);\r\n    printf("%s ", str1);\r\n    return 0;\r\n}', 'char *str1 = "Geeks "; can be changed to char str1[100] = "Geeks ";', 'char *str1 = "Geeks "; can be changed to char str1[100] = "Geeks "; and a line a[m+n-1] = ''\\0'' is added at the end of myStrcat', 'A line a[m+n-1] = ''\\0'' is added at the end of myStrcat', 'A line ''a = (char *)malloc(sizeof(char)*(strlen(a) + strlen(b) + 1)) is added at the beginning of myStrcat()', 'option1', 4, 2);
INSERT INTO `GothamCity_questions` VALUES(4, '#include <stdio.h>\r\nint main()\r\n{\r\n    int i = 5;\r\n    printf("%d %d %d", i++, i++, i++);\r\n    return 0;\r\n}', '7 6 5', '5 6 7', '7 7 7', 'Compiler Dependent', 'option4', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(5, '# include <stdio.h>\r\nvoid fun(int x)\r\n{\r\n    x = 30;\r\n}\r\n \r\nint main()\r\n{\r\n  int y = 20;\r\n  fun(y);\r\n  printf("%d", y);\r\n  return 0;\r\n}', '30', '20', 'Compile time error', 'Run Time Error', 'option2', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(6, 'Which of the following is true about return type of functions in C?', 'Functions can return any type', 'Functions can return any type except array and functions', 'Functions can return any type except array and functions', 'Functions can return any type except array, functions, function pointer and union', 'option2', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(7, '#include <stdio.h>\r\nint main()\r\n{\r\n  printf("%d", main);  \r\n  return 0;\r\n}', 'Address of main function', 'Compiler Error', 'Runtime Error', 'Some Random Value', 'option1', 5, 1);
INSERT INTO `GothamCity_questions` VALUES(8, '# include <stdio.h>\r\nvoid fun(int *ptr)\r\n{\r\n    *ptr = 30;\r\n}\r\n \r\nint main()\r\n{\r\n  int y = 20;\r\n  fun(&y);\r\n  printf("%d", y);\r\n \r\n  return 0;\r\n}', '20', '30', 'Compile time error', 'Run Time Error', 'option2', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(9, 'Which of the following is true about arrays in C.', 'For every type T, there can be an array of T.', 'For every type T except void and function type, there can be an array of T.', 'When an array is passed to a function, C compiler creates a copy of array.', '2D arrays are stored in column major form', 'option2', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(10, 'Consider the following three C functions :\r\n[PI] int * g (void) \r\n{ \r\n  int x= 10; \r\n  return (&x); \r\n}  \r\n   \r\n[P2] int * g (void) \r\n{ \r\n  int * px; \r\n  *px= 10; \r\n  return px; \r\n} \r\n   \r\n[P3] int *g (void) \r\n{ \r\n  int *px; \r\n  px = (int *) malloc (sizeof(int)); \r\n  *px= 10; \r\n  return px; \r\n}\r\n\r\nWhich of the above three functions are likely to cause problems with pointers? ', 'Only P3', 'Only P1 and P3', 'Only P1 and P2', 'P1, P2 and P3', 'option3', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(11, 'Predict the output of the below program:\r\n#include <stdio.h>\r\n#define SIZE(arr) sizeof(arr) / sizeof(*arr);\r\nvoid fun(int* arr, int n)\r\n{\r\n    int i;\r\n    *arr += *(arr + n - 1) += 10;\r\n}\r\n \r\nvoid printArr(int* arr, int n)\r\n{\r\n    int i;\r\n    for(i = 0; i < n; ++i)\r\n        printf("%d ", arr[i]);\r\n}\r\n \r\nint main()\r\n{\r\n    int arr[] = {10, 20, 30};\r\n    int size = SIZE(arr);\r\n    fun(arr, size);\r\n    printArr(arr, size);\r\n    return 0;\r\n}', '20 30 40', '20 20 40', '50 20 40', 'Compile Time Error', 'option3', 5, 1);
INSERT INTO `GothamCity_questions` VALUES(12, 'What is the return type of malloc() or calloc() ?', 'void *', 'Pointer of allocated memory type', 'void**', 'int*', 'option1', 3, 1);
INSERT INTO `GothamCity_questions` VALUES(13, 'What is the problem with following code?\r\n#include<stdio.h>\r\nint main()\r\n{\r\n    int *p = (int *)malloc(sizeof(int));\r\n \r\n    p = NULL;\r\n \r\n    free(p);\r\n}', 'Compiler Error: free can''t be applied on NULL pointer', 'Memory Leak', 'Dangling Pointer', 'The program may crash as free() is called for NULL pointer.', 'option2', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `GothamCity_users`
--

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

--
-- Dumping data for table `GothamCity_users`
--

INSERT INTO `GothamCity_users` VALUES('mayanka', 'rew', 'mayankarew@gmail.com', '999999999', 4, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('mayank', 'rew', 'mayanka17re@gmail.com', '9671537388', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('Light', 'Yagami', 'lightyagami@gmail.com', '1234567891', -2, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('L', '...', 'l.mn@gmail.com', '5555555555', 4, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('navneet', 'verma', 'navneet@gmail.com', '8950683510', 3, 2, 1, 1);
INSERT INTO `GothamCity_users` VALUES('Navi', 'navi', 'navi@gmail.com', '3454253452', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('Abhik', 'Setia', 'abhik@gmail.com', '8950354322', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('abhik', 'setia', 'ggshsb@hhsj', '0895022773', 3, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('awgdkwag', 'gdakjgwdkj', 'gdkagw@dkawvdkh', '9468468446', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('sai', 'charan', 'saicharanrachamadugu@ymail.com', '8950884197', -12, 11, 0, 11);
INSERT INTO `GothamCity_users` VALUES('anon', 'ymous', 'anon8950@gmail.com', '9999999999', 0, 7, 2, 5);
INSERT INTO `GothamCity_users` VALUES('rushi', 'nagireddy', 'nyruhi310@gmail.com', '7206305406', 3, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('Ayush', 'Gupta', 'ayushgupta1995@gmail.com', '8950048994', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('Rimsha', 'Goomer', 'rimshaa15@gmail.com', '8222000151', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('sudhir', 'meena', 'sureshmeena512@gmail.com', '9728430813', 3, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('sakir', 'khan', 'ksakir486@gmail.com', '7206304985', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('Ayush', 'gu[ta', 'wdefgr@fgh.com', '67890', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('sdf', 'wdefrg', 'sfe@dv.com', '895004899', 5, 4, 2, 2);
INSERT INTO `GothamCity_users` VALUES('R', 'G', 'r@g.c', '12', 11, 7, 4, 3);
INSERT INTO `GothamCity_users` VALUES('detective', '1', 'sehrunhifi@gmail.com', '9587716192', 6, 11, 4, 7);
INSERT INTO `GothamCity_users` VALUES('sudhir', 'meena', 'meenasudhir54@gmail.com', '9414986443', 11, 12, 5, 7);
INSERT INTO `GothamCity_users` VALUES('nasdfasdg', 'dfgsdhdf', 'sdfgsdf@gmail.com', '7656787298', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('adf', 'dfd', 'ad@gmail.com', '234', 4, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('Jyoti', 'Jangra', 'jjangra2@gmail.com', '8053200170', 9, 12, 5, 7);
INSERT INTO `GothamCity_users` VALUES('giwgsi', 'jgkwdgk', 'kgxjg@gkjebdkj', '3264932647', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('Froade', '1', 'Froade34@einrot.com', '9549337718', 3, 1, 1, 0);
INSERT INTO `GothamCity_users` VALUES('sk', '1', 'Houn1942@dayrep.com', '8058457950', 10, 11, 5, 6);
INSERT INTO `GothamCity_users` VALUES('Utkarsh', 'Kumar', 'utkarsh578@gmail.com', '0805945948', -3, 2, 0, 2);
INSERT INTO `GothamCity_users` VALUES('ajbwdkj', 'kbdakjwbd', 'bdakjwbk@BDkjabd', '9740917097', -1, 1, 0, 1);
INSERT INTO `GothamCity_users` VALUES('jsbfdalf', 'faln', 'alwdlk@ajdj.akhwdok', '3469136498', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('a', 'a', 'an0@gmail.com', 'a', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('awkgdgaidku', 'dkjawgk', 'dgakwj@dmawbmdw', '1t341t348', 0, 0, 0, 0);
INSERT INTO `GothamCity_users` VALUES('navadasdf', 'verma', 'nasdfasd@gmail.com', '8784792348', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_name` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `event_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`test_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` VALUES('GothamCity', 'abhik', '2016-02-21 12:00:00', '2016-03-01 12:00:00', '2016-02-12', 30);
INSERT INTO `test` VALUES('Excalibur', 'abhik', '2016-02-28 14:00:00', '2016-02-28 19:00:00', '2016-02-26', 40);
