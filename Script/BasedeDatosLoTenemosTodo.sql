/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     03-07-2015 22:04:56                          */
/*==============================================================*/
/*==============================================================*/
/* Base de datos: `lotenemostodo`                            */
/*==============================================================*/


CREATE DATABASE IF NOT EXISTS `lotenemostodo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `lotenemostodo`;

drop table if exists DETALLE_OC;

drop table if exists ORDEN_COMPRAS;

drop table if exists PERFIL;

drop table if exists PRODUCTOS;

drop table if exists TIPO_PRODUCTO;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: DETALLE_OC                                            */
/*==============================================================*/
create table DETALLE_OC
(
   ID_OC                bigint unsigned not null,
   ID_PRODUCTO          bigint unsigned not null,
   CANTIDAD             numeric(10,0) not null,
   SUB_TOTAL            numeric(50,0) not null
);

/*==============================================================*/
/* Table: ORDEN_COMPRAS                                         */
/*==============================================================*/
create table ORDEN_COMPRAS
(
   ID_OC                bigint unsigned not null auto_increment,
   ID_USUARIO           bigint unsigned not null,
   FECHA_EMISION        date not null,
   TOTAL_OC             numeric(50,0) not null,
   ESTADO               varchar(25) not null,
   primary key (ID_OC)
);

/*==============================================================*/
/* Table: PERFIL                                                */
/*==============================================================*/
create table PERFIL
(
   ID_PERFIL            bigint unsigned not null auto_increment,
   DESCRIPCION_PERFIL   varchar(250) not null,
   primary key (ID_PERFIL, DESCRIPCION_PERFIL)
);

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS
(
   ID_PRODUCTO          bigint unsigned not null auto_increment,
   ID_TIPO_PRODUCTO     bigint unsigned not null,
   DESCRIPCION          varchar(150) not null,
   PRECIO               numeric(50,0) not null,
   UNIDAD               numeric(10,0) not null,
   primary key (ID_PRODUCTO)
);

/*==============================================================*/
/* Table: TIPO_PRODUCTO                                         */
/*==============================================================*/
create table TIPO_PRODUCTO
(
   ID_TIPO_PRODUCTO     bigint unsigned not null auto_increment,
   DESCRIPCION_TIPO     varchar(250) not null,
   primary key (ID_TIPO_PRODUCTO)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   ID_USUARIO           bigint unsigned not null auto_increment,
   ID_PERFIL            bigint unsigned not null,
   DESCRIPCION_PERFIL   varchar(250) not null,
   LOGIN_USUARIO        varchar(150) not null,
   PASS_USUARIO         varchar(64) not null,
   NOMBRE_USUARIO       varchar(50) not null,
   APELLIDO_USUARIO     varchar(50) not null,
   CORREO_USUARIO       varchar(150) not null,
   EDAD_USUARIO         numeric(5,0) not null,
   FECHANACIMIENTO_USUARIO date,
   primary key (ID_USUARIO)
);

alter table DETALLE_OC add constraint FK_GENERA foreign key (ID_OC)
      references ORDEN_COMPRAS (ID_OC) on delete restrict on update restrict;

alter table DETALLE_OC add constraint FK_OBTIENE foreign key (ID_PRODUCTO)
      references PRODUCTOS (ID_PRODUCTO) on delete restrict on update restrict;

alter table ORDEN_COMPRAS add constraint FK_CREA foreign key (ID_USUARIO)
      references USUARIO (ID_USUARIO) on delete restrict on update restrict;

alter table PRODUCTOS add constraint FK_PERTENECE foreign key (ID_TIPO_PRODUCTO)
      references TIPO_PRODUCTO (ID_TIPO_PRODUCTO) on delete restrict on update restrict;

alter table USUARIO add constraint FK_TIENE foreign key (ID_PERFIL, DESCRIPCION_PERFIL)
      references PERFIL (ID_PERFIL, DESCRIPCION_PERFIL) on delete restrict on update restrict;

