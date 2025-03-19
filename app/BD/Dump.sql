-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: sql10714828
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acesso` (
  `idAcesso` tinyint NOT NULL,
  `nivelAcesso` tinyint NOT NULL,
  `nome` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,1,'Usuario'),(2,2,'Admin');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `idAutor` tinyint NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idAutor`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Teste'),(2,'Autor 2'),(3,'Autor 3'),(4,'Autor 4'),(5,'Autor 5'),(6,'Autor 6'),(7,'Autor 7'),(8,'Autor 1'),(9,'Autor'),(10,'sim'),(11,'gui gatao'),(12,'DEUS');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificacaoindicativa`
--

DROP TABLE IF EXISTS `classificacaoindicativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classificacaoindicativa` (
  `idClassificacaoIndicativa` tinyint NOT NULL,
  `classificacao` char(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descricao` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idClassificacaoIndicativa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificacaoindicativa`
--

LOCK TABLES `classificacaoindicativa` WRITE;
/*!40000 ALTER TABLE `classificacaoindicativa` DISABLE KEYS */;
INSERT INTO `classificacaoindicativa` VALUES (1,'L','Livre'),(2,'10','NR p menor 10 anos'),(3,'12','NR p menor 12 anos'),(4,'14','NR p menor 14 anos'),(5,'16','NR p menor 16 anos'),(6,'18','NR p menor 18 anos');
/*!40000 ALTER TABLE `classificacaoindicativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
  `idEditora` tinyint NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEditora`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Teste'),(2,'Editora 2'),(3,'Editora 3'),(4,'Editora 4'),(5,'Editora 5'),(6,'Editora 6'),(7,'Editora 7'),(8,'Editora 1'),(9,'Editora'),(10,'deus'),(11,'gatao'),(12,'DEUS');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estoque` (
  `idEstoque` smallint NOT NULL AUTO_INCREMENT,
  `quantidade` smallint NOT NULL,
  `emUso` smallint NOT NULL,
  PRIMARY KEY (`idEstoque`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estoque`
--

LOCK TABLES `estoque` WRITE;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` VALUES (3,10,0),(5,10,0),(6,100,0),(7,100,0),(8,100,0),(9,100,0),(10,100,0),(11,100,0),(12,100,0),(13,1,1),(14,10,0);
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generoliterario`
--

DROP TABLE IF EXISTS `generoliterario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generoliterario` (
  `idGeneroLiterario` smallint NOT NULL AUTO_INCREMENT,
  `genero` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idGeneroLiterario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generoliterario`
--

LOCK TABLES `generoliterario` WRITE;
/*!40000 ALTER TABLE `generoliterario` DISABLE KEYS */;
INSERT INTO `generoliterario` VALUES (1,'Romance'),(2,'Ficção'),(3,'Fantasia'),(4,'Mistério'),(5,'Aventura'),(6,'Terror'),(7,'Biografia'),(8,'Comédia'),(9,'Drama'),(10,'História'),(11,'Ação'),(12,'Poesia'),(13,'Religião');
/*!40000 ALTER TABLE `generoliterario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generolivro`
--

DROP TABLE IF EXISTS `generolivro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generolivro` (
  `fkGenero` smallint NOT NULL,
  `fkLivro` smallint NOT NULL,
  PRIMARY KEY (`fkGenero`,`fkLivro`),
  KEY `fk_generoLiterario_has_livro_livro1_idx` (`fkLivro`),
  KEY `fk_generoLiterario_has_livro_generoLiterario1_idx` (`fkGenero`),
  CONSTRAINT `fk_generoLiterario_has_livro_generoLiterario1` FOREIGN KEY (`fkGenero`) REFERENCES `generoliterario` (`idGeneroLiterario`),
  CONSTRAINT `fk_generoLiterario_has_livro_livro1` FOREIGN KEY (`fkLivro`) REFERENCES `livro` (`idLivro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generolivro`
--

LOCK TABLES `generolivro` WRITE;
/*!40000 ALTER TABLE `generolivro` DISABLE KEYS */;
INSERT INTO `generolivro` VALUES (13,1),(6,2);
/*!40000 ALTER TABLE `generolivro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generosubgenero`
--

DROP TABLE IF EXISTS `generosubgenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generosubgenero` (
  `fkSubgenero` smallint NOT NULL,
  `fkGenero` smallint NOT NULL,
  PRIMARY KEY (`fkSubgenero`,`fkGenero`),
  KEY `fk_subgenero_has_generoliterario_generoliterario1_idx` (`fkGenero`),
  KEY `fk_subgenero_has_generoliterario_subgenero_idx` (`fkSubgenero`),
  CONSTRAINT `fk_subgenero_has_generoliterario_generoliterario1` FOREIGN KEY (`fkGenero`) REFERENCES `generoliterario` (`idGeneroLiterario`),
  CONSTRAINT `fk_subgenero_has_generoliterario_subgenero` FOREIGN KEY (`fkSubgenero`) REFERENCES `subgenero` (`idsubgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generosubgenero`
--

LOCK TABLES `generosubgenero` WRITE;
/*!40000 ALTER TABLE `generosubgenero` DISABLE KEYS */;
/*!40000 ALTER TABLE `generosubgenero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagem` (
  `idImagem` smallint NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tamanho` int NOT NULL,
  PRIMARY KEY (`idImagem`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem`
--

LOCK TABLES `imagem` WRITE;
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
INSERT INTO `imagem` VALUES (1,'book.png','image/png',39932),(2,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(3,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(4,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(5,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(6,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(7,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(8,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(9,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(10,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(11,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(12,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(13,'138717493ac5df2d70dc2f8f02926612.jfif','image/jpeg',23365),(14,'images.png','image/png',3551),(15,'images.png','image/png',3551);
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `idLivro` smallint NOT NULL AUTO_INCREMENT,
  `fkAutor` tinyint NOT NULL,
  `fkImagem` smallint NOT NULL,
  `fkClassificacao` tinyint NOT NULL,
  `fkEditora` tinyint NOT NULL,
  `fkEstoque` smallint NOT NULL,
  `titulo` varchar(75) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `descricao` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `paginas` mediumint NOT NULL,
  `edicao` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lancamento` date NOT NULL,
  `isbn` char(13) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idLivro`),
  KEY `fk_livro_autor_idx` (`fkAutor`),
  KEY `fk_livro_editora1_idx` (`fkEditora`),
  KEY `fk_livro_classificacaoIndicativa1_idx` (`fkClassificacao`),
  KEY `fk_livro_estoque1_idx` (`fkEstoque`),
  KEY `fk_livro_imagem1_idx` (`fkImagem`),
  CONSTRAINT `fk_livro_autor` FOREIGN KEY (`fkAutor`) REFERENCES `autor` (`idAutor`),
  CONSTRAINT `fk_livro_classificacaoIndicativa1` FOREIGN KEY (`fkClassificacao`) REFERENCES `classificacaoindicativa` (`idClassificacaoIndicativa`),
  CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`fkEditora`) REFERENCES `editora` (`idEditora`),
  CONSTRAINT `fk_livro_estoque1` FOREIGN KEY (`fkEstoque`) REFERENCES `estoque` (`idEstoque`),
  CONSTRAINT `fkImagem` FOREIGN KEY (`fkImagem`) REFERENCES `imagem` (`idImagem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,12,3,6,12,13,'A cabana','A cabana',133,'12','2012-06-10','9780340979495'),(2,2,1,1,2,14,'Livro 2','Livro teste para análise',100,'1','2002-05-12','');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livrospedidos`
--

DROP TABLE IF EXISTS `livrospedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livrospedidos` (
  `idlivrosPedidos` smallint NOT NULL AUTO_INCREMENT,
  `fkLivro` smallint NOT NULL,
  `fkUsuario` smallint NOT NULL,
  `dataPedido` datetime NOT NULL,
  `dataRetirada` date NOT NULL,
  `dataDevolucao` date NOT NULL,
  `isEmUso` tinyint(1) NOT NULL,
  PRIMARY KEY (`idlivrosPedidos`),
  KEY `fk_livrosPedidos_livro1_idx` (`fkLivro`),
  KEY `fk_livrosPedidos_usuario1_idx` (`fkUsuario`),
  CONSTRAINT `fk_livrosPedidos_livro1` FOREIGN KEY (`fkLivro`) REFERENCES `livro` (`idLivro`),
  CONSTRAINT `fk_livrosPedidos_usuario1` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livrospedidos`
--

LOCK TABLES `livrospedidos` WRITE;
/*!40000 ALTER TABLE `livrospedidos` DISABLE KEYS */;
INSERT INTO `livrospedidos` VALUES (1,1,1,'2024-11-25 07:11:40','2024-12-12','2024-12-19',0);
/*!40000 ALTER TABLE `livrospedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subgenero`
--

DROP TABLE IF EXISTS `subgenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subgenero` (
  `idsubgenero` smallint NOT NULL AUTO_INCREMENT,
  `subgenero` varchar(30) NOT NULL,
  PRIMARY KEY (`idsubgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subgenero`
--

LOCK TABLES `subgenero` WRITE;
/*!40000 ALTER TABLE `subgenero` DISABLE KEYS */;
/*!40000 ALTER TABLE `subgenero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contatos`
--

DROP TABLE IF EXISTS `tbl_contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_contatos` (
  `id` int NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Telefone` varchar(12) NOT NULL,
  PRIMARY KEY (`id`,`Nome`,`Email`,`Telefone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contatos`
--

LOCK TABLES `tbl_contatos` WRITE;
/*!40000 ALTER TABLE `tbl_contatos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` smallint NOT NULL AUTO_INCREMENT,
  `fkImagemPerfil` smallint NOT NULL,
  `fkAcesso` tinyint NOT NULL,
  `nome` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(75) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telefone` char(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `telefone_UNIQUE` (`telefone`),
  KEY `fk_usuario_acesso1_idx` (`fkAcesso`),
  KEY `idUsuario` (`idUsuario`),
  KEY `fk_usuario_imagem1_idx` (`fkImagemPerfil`),
  CONSTRAINT `fk_usuario_acesso1` FOREIGN KEY (`fkAcesso`) REFERENCES `acesso` (`idAcesso`),
  CONSTRAINT `fk_usuario_imagem1` FOREIGN KEY (`fkImagemPerfil`) REFERENCES `imagem` (`idImagem`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,15,2,'admin','admin@gmail.com','$2y$04$G4KbLsUuWIYVuFk.nJfj2.83OoO6UZlGjO0MAGln2loEsxnK/MK32','12312312312'),(2,0,1,'Usuario','user@gmail.com','$2y$04$G4KbLsUuWIYVuFk.nJfj2.83OoO6UZlGjO0MAGln2loEsxnK/MK32','43212234561'),(3,0,1,'Usuario2','user2@gmail.com','$2y$04$G4KbLsUuWIYVuFk.nJfj2.83OoO6UZlGjO0MAGln2loEsxnK/MK32','43212234562'),(4,0,1,'usuario3','user3@gmail.com','$2y$04$j74kbWIU.sl.F56RBjZDk.32cGu.amKGO1a47tGLLBQIVne0kVdXK','12323153623'),(5,0,1,'admin','admin2@gmail.com','$2y$04$TcbO.G6NJC6.l69/w1dVjebcmzA2uX8h9gASstfMOxIxIrQks.Mj6','52152131231'),(6,0,1,'Teste','teste@gmail.com','$2y$04$lRofdpuhr.T/FS8wIRD9OOfT0a96gNVeTobHBSx0GAcClKnc4i5SO','12341324321');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-25 15:24:58
