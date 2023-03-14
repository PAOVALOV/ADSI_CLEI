/*
 Navicat Premium Data Transfer

 Source Server         : ADSI_CLEI
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : adsi_clei

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 09/12/2022 18:19:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador`  (
  `id_administrador` int NOT NULL AUTO_INCREMENT,
  `documento_administrador` int NOT NULL,
  `nombre_administrador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `apellido_administrador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cargo_administrador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `correo_administrador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_administrador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `password_administrador` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_administrador`, `documento_administrador`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of administrador
-- ----------------------------
INSERT INTO `administrador` VALUES (1, 1005461023, 'Andrea', 'Valenzuela', 'Administrador', 'povalle.641@gmail.com', '1005461023', '1005461023');
INSERT INTO `administrador` VALUES (3, 2147483647, 'Admin', 'Prueba', 'Administrador', 'prueba@gmail.com', 'Admin', '1234');

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados`  (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `nombreempleado_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `apellidoempleado_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `documentoempleado_login` int NULL DEFAULT NULL,
  `usuario_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `passport_login` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `cargoempleado_login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_login`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (1, '', '', 0, '0', ' ', '');
INSERT INTO `empleados` VALUES (2, 'Ani ', 'Zamudio', 1006897412, 'Aniadmi', '1234', 'Administrador');
INSERT INTO `empleados` VALUES (3, 'Paula', 'Ovalle', 1005461128, 'Paovadmi', '1234', 'Administrador');
INSERT INTO `empleados` VALUES (4, 'Admin', 'Prueba', 1234567890, 'Admin', '1234', 'Administrador');
INSERT INTO `empleados` VALUES (5, 'Daniela', 'Quiroga', 1058794566, '1058794566', 'Adsi/123+', 'Empleado');

-- ----------------------------
-- Table structure for estudiantes
-- ----------------------------
DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE `estudiantes`  (
  `id_estudiante` int NOT NULL AUTO_INCREMENT,
  `documento_estudiante` int NOT NULL,
  `nombre_estudiante` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido_estudiante` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `email_estudiante` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fechadenacimiesto_estudiante` date NULL DEFAULT NULL,
  `numerocontacto_estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `ciudad_estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `discapacidad_estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `curso_estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `horario_estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `acudiente__estudiante` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_estudiante`, `documento_estudiante`, `nombre_estudiante`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of estudiantes
-- ----------------------------
INSERT INTO `estudiantes` VALUES (7, 1234, 'Karen Liseth', 'Martínez López', 'MartiJuna@gmail.com', '2000-09-14', '3001234567', 'Medellín', 'No', 'PREICFES', 'Sábados', '3118815430');
INSERT INTO `estudiantes` VALUES (8, 1005461023, 'Paula Andrea', 'Ovalle Valenzuela', 'paula.ovalle0@misena.edu.co', '2002-06-11', '3124215311', 'Bogotá', 'No', 'PreUniversitario', 'Domingos_de_08:00_am_a_01:00_pm', '3115442121');
INSERT INTO `estudiantes` VALUES (9, 1234567890, 'Catia', 'Vázquez', 'Catiamarv@gmail.com', '2000-05-21', '3214578945', 'Bogotá', 'No', 'Validación_del_bachillerato', 'Martes y jueves de 8:00 am a 10:30 am', '3116587954');
INSERT INTO `estudiantes` VALUES (10, 38524617, 'Laura Valentina', 'Gonzales Torres', 'Lauirtorr@gmail.com', '1998-12-25', '3214587957', 'Cúcuta ', 'No', 'Validación_del_bachillerato', 'Sábados_de_08:00_am_a_01:00 pm', '3059875656');
INSERT INTO `estudiantes` VALUES (11, 98146244, 'Sofia', 'Castro Villalobos', 'Sofitiar@gmial.com', '1997-04-03', '3048794565', 'Bogotá', 'No', 'Pre_Universitario', 'Domingos_de_08:00_am_a_01:00_pm', '3085976412');
INSERT INTO `estudiantes` VALUES (12, 26548412, 'Pablo Esteban', 'Orduz Peña', 'Lauirtorr@gmail.com', '2002-01-02', '3068994565', 'Bucaramanga', 'No', 'PREICFES_Saber_11', 'Sábados_de_08:00_am_a_01:00 pm', '3115487791');
INSERT INTO `estudiantes` VALUES (13, 1005478987, 'Katherin Xiomara', 'Gamboa Valenzuela', 'Xiomigamboa@gmail.com', '2004-01-17', '3148765459', 'Bogotá', 'No', 'Pre - Universitario', 'Domingos_de_08:00_am_a_01:00_pm', '3012975712');
INSERT INTO `estudiantes` VALUES (14, 69448755, 'Laura Danuela', 'Cardona Molina', 'Luaraposra@gmail.com', '2001-06-14', '3125789484', 'Puente Nacional', 'No', 'PREICFES - Saber 11', 'Sábados_de_08:00_am_a_01:00 pm', '3058798515');
INSERT INTO `estudiantes` VALUES (15, 78958471, 'Maria Aline', 'Gomez Gutierrez ', 'Laugutierrez.2314@gmial.com', '1852-11-15', '3205652028', 'Cartagena', 'No', 'Validación del bachillerato', 'Martes y jueves de 8:00 am a 10:30 am', '3025185684');
INSERT INTO `estudiantes` VALUES (16, 524612, 'Conztanza', 'Ramos Cuesta', 'Ramosdt15@gmail.com', '1991-05-22', '3218795841', 'Melgar', 'No', 'Validación del bachillerato', 'Sábados_de_08:00_am_a_01:00 pm', '3012554155');
INSERT INTO `estudiantes` VALUES (17, 1006987411, 'Monica ', 'Ariza Fajardo', 'Moni2000@gmail.com', '2000-09-22', '3042549595', 'Choco ', 'No', 'PREICFES - Saber 11', 'Domingos_de_08:00_am_a_01:00_pm', '3045651515');
INSERT INTO `estudiantes` VALUES (18, 654123, 'Sara ', 'Martinez', 'Prueba@gmial.com', '1988-05-11', '12345121212', 'Barranquilla', 'SI', 'Validación del bachillerato', 'Martes_y_jueves_de_6:30_pm_a_09:00 pm', '31485441554');

-- ----------------------------
-- Table structure for financiero
-- ----------------------------
DROP TABLE IF EXISTS `financiero`;
CREATE TABLE `financiero`  (
  `id_financiero` int NOT NULL AUTO_INCREMENT,
  `documentoestudiante_financiero` int NOT NULL,
  `fechadepago_financiero` date NULL DEFAULT NULL,
  `valorcancelado_financiero` int NULL DEFAULT NULL,
  `metododepago_financiero` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `referenciadepago_financiero` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `empleado_financiero` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `comprobante_financiero` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_financiero`, `documentoestudiante_financiero`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of financiero
-- ----------------------------
INSERT INTO `financiero` VALUES (1, 1005461023, '2022-08-03', 50000, 'NEQUI', 'RT5342', 'JULIAN PAÉZ', NULL);
INSERT INTO `financiero` VALUES (2, 1234, '2022-05-11', 60000, 'BANCOLOMBIA', 'TREWES', 'LAURA VANEGAS', NULL);
INSERT INTO `financiero` VALUES (3, 45872655, '2018-06-03', 80000, 'NEQUI', 'RTEAS', 'SOFIA TORRES', NULL);
INSERT INTO `financiero` VALUES (4, 1405665022, '2022-07-30', 50000, 'WOMPI', 'RT45162', 'MATEO LÓPEZ', NULL);
INSERT INTO `financiero` VALUES (5, 1234, '2022-11-02', 50000, 'Bancolombia', '123', 'Julian Paez', NULL);
INSERT INTO `financiero` VALUES (6, 1234, '2022-11-22', 200000, 'Nequi', '545plki', 'Laura Vanegas', NULL);
INSERT INTO `financiero` VALUES (7, 654123, '2022-11-27', 120000, 'Bancolombia', 'Poyt1245', 'Sofia Torres', NULL);
INSERT INTO `financiero` VALUES (8, 654123, '2022-11-27', 120000, 'Bancolombia', 'Poyt1245', 'Sofia Torres', NULL);

-- ----------------------------
-- Table structure for novedades
-- ----------------------------
DROP TABLE IF EXISTS `novedades`;
CREATE TABLE `novedades`  (
  `id_novedades` int NOT NULL AUTO_INCREMENT,
  `documentoestudiante_novedades` int NOT NULL,
  `empleado_novedades` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `anexo_novedades` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `fecha_novedades` date NULL DEFAULT NULL,
  `tipo_novedades` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_novedades`, `documentoestudiante_novedades`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of novedades
-- ----------------------------
INSERT INTO `novedades` VALUES (1, 1405665022, 'JULIAN PAÉZ', 'Al día con los pagos pero no asiste a clases', '2022-08-01', NULL);
INSERT INTO `novedades` VALUES (2, 1005461023, 'LAURA VANEGAS', 'Estudiante al día con los pagos', '2022-08-09', NULL);
INSERT INTO `novedades` VALUES (3, 45872655, 'MATEO HERNANDEZ', 'Estudiante atrasada con los pagos y asiste a clases', '2022-07-31', NULL);
INSERT INTO `novedades` VALUES (4, 1007211454, 'MATEO HERNANDEZ', 'Estudiante a paz y salvo con la institución.', '2022-05-15', NULL);
INSERT INTO `novedades` VALUES (5, 1234, 'Julian Paez', 'Potatos', '2022-11-11', 'Acuerdo de pago');
INSERT INTO `novedades` VALUES (6, 1234, 'Julian Paez', '', '0000-00-00', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (7, 1234, 'Julian Paez', '', '0000-00-00', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (8, 1234, 'Julian Paez', '', '0000-00-00', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (9, 1234, 'Julian Paez', 'asd', '2022-11-16', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (10, 1234, 'Sofia Torres', 'rliul', '2022-11-12', 'Retiro');
INSERT INTO `novedades` VALUES (11, 1234, 'Julian Paez', 'uj', '2022-10-31', 'Acuerdo de pago');
INSERT INTO `novedades` VALUES (12, 1234, 'Elige tu nombre', 'as', '2022-11-28', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (13, 1234, 'Elige tu nombre', 'sas', '2022-11-28', 'Tipo de novedad');
INSERT INTO `novedades` VALUES (14, 1234, 'Laura Vanegas', 'a', '2022-12-21', 'Retiro');

SET FOREIGN_KEY_CHECKS = 1;
