/*==============================================================*/
/* Table : ADMINISTRATEUR                                       */
/*==============================================================*/
create table ADMINISTRATEUR 
(
   ID_ADMIN             integer                        not null,
   PSEUDO_ADMIN         varchar(15)                    not null,
   MDP_ADMIN            varchar(15)                    not null,
   EMAIL_ADMIN          varchar(30)                    not null,
   constraint PK_ADMINISTRATEUR primary key (ID_ADMIN)
);

/*==============================================================*/
/* Index : ADMINISTRATEUR_PK                                    */
/*==============================================================*/
create unique index ADMINISTRATEUR_PK on ADMINISTRATEUR (
ID_ADMIN ASC
);

/*==============================================================*/
/* Table : ADRESSE                                              */
/*==============================================================*/
create table ADRESSE 
(
   ID_ADRESSE           integer                        not null,
   NUM_RUE              integer                        null,
   NOM_VOIE             long varchar                   null,
   CP                   smallint                       null,
   VILLE                long varchar                   null,
   constraint PK_ADRESSE primary key (ID_ADRESSE)
);

/*==============================================================*/
/* Index : ADRESSE_PK                                           */
/*==============================================================*/
create unique index ADRESSE_PK on ADRESSE (
ID_ADRESSE ASC
);

/*==============================================================*/
/* Table : AUTHENTIFICATIONCLIENT                               */
/*==============================================================*/
create table AUTHENTIFICATIONCLIENT 
(
   LOGIN              char(15)                       not null,
   ID_CLIENT            integer                        not null,
   MDP                  char(20)                       not null,
   constraint PK_AUTHENTIFICATIONCLIENT primary key (LOGIN)
);

/*==============================================================*/
/* Index : AUTHENTIFICATIONCLIENT_PK                            */
/*==============================================================*/
create unique index AUTHENTIFICATIONCLIENT_PK on AUTHENTIFICATIONCLIENT (
LOGIN ASC
);

/*==============================================================*/
/* Index : AVOIR3_FK                                            */
/*==============================================================*/
create index AVOIR3_FK on AUTHENTIFICATIONCLIENT (
ID_CLIENT ASC
);

/*==============================================================*/
/* Table : AVOIR                                                */
/*==============================================================*/
create table AVOIR 
(
   ID_PROD              integer                        not null,
   IDPANIER             integer                        not null,
   ID_PRIX              integer                        not null,
   QUANTITE_PROD        integer                        null,
   constraint PK_AVOIR primary key clustered (ID_PROD, IDPANIER, ID_PRIX)
);


/*==============================================================*/
/* Index : AVOIR_FK                                             */
/*==============================================================*/
create index AVOIR_FK on AVOIR (
ID_PROD ASC
);

/*==============================================================*/
/* Index : AVOIR4_FK                                            */
/*==============================================================*/
create index AVOIR4_FK on AVOIR (
IDPANIER ASC
);

/*==============================================================*/
/* Index : AVOIR6_FK                                            */
/*==============================================================*/
create index AVOIR6_FK on AVOIR (
ID_PRIX ASC
);

/*==============================================================*/
/* Table : AVOIR1                                               */
/*==============================================================*/
create table AVOIR1 
(
   ID_CLIENT            integer                        not null,
   ID_ADRESSE           integer                        not null,
   constraint PK_AVOIR1 primary key (ID_CLIENT, ID_ADRESSE)
);


/*==============================================================*/
/* Index : AVOIR1_FK                                            */
/*==============================================================*/
create index AVOIR1_FK on AVOIR1 (
ID_CLIENT ASC
);

/*==============================================================*/
/* Index : AVOIR5_FK                                            */
/*==============================================================*/
create index AVOIR5_FK on AVOIR1 (
ID_ADRESSE ASC
);

/*==============================================================*/
/* Table : BILAN                                                */
/*==============================================================*/
create table BILAN 
(
   ID_BILAN             integer                        not null,
   DATE_DEB_BILAN       timestamp                      not null,
   DATE_FIN_BILAN       timestamp                      not null,
   constraint PK_BILAN primary key (ID_BILAN)
);

/*==============================================================*/
/* Index : BILAN_PK                                             */
/*==============================================================*/
create unique index BILAN_PK on BILAN (
ID_BILAN ASC
);

/*==============================================================*/
/* Table : CATEGORIEPRODUIT                                     */
/*==============================================================*/
create table CATEGORIEPRODUIT 
(
   ID_CATPROD           integer                        not null,
   INTITULE_CAT         varchar(30)                    not null,
   constraint PK_CATEGORIEPRODUIT primary key (ID_CATPROD)
);

/*==============================================================*/
/* Index : CATEGORIEPRODUIT_PK                                  */
/*==============================================================*/
create unique index CATEGORIEPRODUIT_PK on CATEGORIEPRODUIT (
ID_CATPROD ASC
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT 
(
   ID_CLIENT            integer                        not null,
   LOGIN              char(15)                       not null,
   NOM_CLIENT           long varchar                   not null,
   PRENOM_CLIENT        long varchar                   not null,
   PSEUDO_CLIENT        varchar(15)                    not null,
   MDP_CLIENT           varchar(15)                    not null,
   EMAIL                varchar(30)                    not null,
   SEXE                 char(1)                        not null,
   TEL                  numeric(10)                    null,
   constraint PK_CLIENT primary key (ID_CLIENT)
);

/*==============================================================*/
/* Index : CLIENT_PK                                            */
/*==============================================================*/
create unique index CLIENT_PK on CLIENT (
ID_CLIENT ASC
);

/*==============================================================*/
/* Index : AVOIR2_FK                                            */
/*==============================================================*/
create index AVOIR2_FK on CLIENT (
LOGIN ASC
);

/*==============================================================*/
/* Table : ESTPROPOSER1                                         */
/*==============================================================*/
create table ESTPROPOSER1 
(
   ID_CLIENT            integer                        not null,
   ID_OFFREREDUC        integer                        not null,
   constraint PK_ESTPROPOSER1 primary key (ID_CLIENT, ID_OFFREREDUC)
);


/*==============================================================*/
/* Index : ESTPROPOSER1_FK                                      */
/*==============================================================*/
create index ESTPROPOSER1_FK on ESTPROPOSER1 (
ID_CLIENT ASC
);

/*==============================================================*/
/* Index : ESTPROPOSER3_FK                                      */
/*==============================================================*/
create index ESTPROPOSER3_FK on ESTPROPOSER1 (
ID_OFFREREDUC ASC
);

/*==============================================================*/
/* Table : EST_RETIRER                                          */
/*==============================================================*/
create table EST_RETIRER 
(
   IDHORAIRER           integer                        not null,
   IDPANIER             integer                        not null,
   constraint PK_EST_RETIRER primary key(IDHORAIRER, IDPANIER)
);


/*==============================================================*/
/* Index : EST_RETIRER_FK                                       */
/*==============================================================*/
create index EST_RETIRER_FK on EST_RETIRER (
IDHORAIRER ASC
);

/*==============================================================*/
/* Index : EST_RETIRER2_FK                                      */
/*==============================================================*/
create index EST_RETIRER2_FK on EST_RETIRER (
IDPANIER ASC
);

/*==============================================================*/
/* Table : HEBDOMADAIRE                                         */
/*==============================================================*/
create table HEBDOMADAIRE 
(
   ID_BILAN             integer                        not null,
   ID_HEBDO             integer                        not null,
   DATE_DEB_BILAN       timestamp                      not null,
   DATE_FIN_BILAN       timestamp                      not null,
   QUANTITE_TOTAL_HISTORISERH float                          not null,
   MONTANT_TOTAL_HISTORISEH float                          not null,
   constraint PK_HEBDOMADAIRE primary key (ID_BILAN, ID_HEBDO)
);

/*==============================================================*/
/* Index : HEBDOMADAIRE_PK                                      */
/*==============================================================*/
create unique index HEBDOMADAIRE_PK on HEBDOMADAIRE (
ID_BILAN ASC,
ID_HEBDO ASC
);

/*==============================================================*/
/* Index : HERITAGE_1_FK                                        */
/*==============================================================*/
create index HERITAGE_1_FK on HEBDOMADAIRE (
ID_BILAN ASC
);

/*==============================================================*/
/* Table : HISTORISER                                           */
/*==============================================================*/
create table HISTORISER 
(
   IDPANIER             integer                        not null,
   ID_BILAN             integer                        not null,
   DATE_SAUVEGARDE      timestamp                      not null,
   MONTANT_TOT_PANIER_VALIDER float                          not null,
   QUANTITE_TOT_PANIER_VALIDER float                          not null,
   constraint PK_HISTORISER primary key (IDPANIER, ID_BILAN)
);


/*==============================================================*/
/* Index : HISTORISER_FK                                        */
/*==============================================================*/
create index HISTORISER_FK on HISTORISER (
IDPANIER ASC
);

/*==============================================================*/
/* Index : HISTORISER2_FK                                       */
/*==============================================================*/
create index HISTORISER2_FK on HISTORISER (
ID_BILAN ASC
);

/*==============================================================*/
/* Table : HORAIRERETRAIT                                       */
/*==============================================================*/
create table HORAIRERETRAIT 
(
   IDHORAIRER           integer                        not null,
   HORAIRE_DEB_RETRAIT  timestamp                      not null,
   HORAIRE_FIN_RETRAIT  timestamp                      not null,
   NBRE_RETRAIT         integer                        not null,
   constraint PK_HORAIRERETRAIT primary key (IDHORAIRER)
);

/*==============================================================*/
/* Index : HORAIRERETRAIT_PK                                    */
/*==============================================================*/
create unique index HORAIRERETRAIT_PK on HORAIRERETRAIT (
IDHORAIRER ASC
);

/*==============================================================*/
/* Table : JOURNALIERE                                          */
/*==============================================================*/
create table JOURNALIERE 
(
   ID_BILAN             integer                        not null,
   ID_JOURNALIER        integer                        not null,
   DATE_DEB_BILAN       timestamp                      not null,
   DATE_FIN_BILAN       timestamp                      not null,
   QUANTITE_TOTAL_HISTORISERJ float                          not null,
   MONTANT_TOTAL_HISTORISEJ float                          not null,
   constraint PK_JOURNALIERE primary key (ID_BILAN, ID_JOURNALIER)
);

/*==============================================================*/
/* Index : JOURNALIERE_PK                                       */
/*==============================================================*/
create unique index JOURNALIERE_PK on JOURNALIERE (
ID_BILAN ASC,
ID_JOURNALIER ASC
);

/*==============================================================*/
/* Index : HERITAGE_2_FK                                        */
/*==============================================================*/
create index HERITAGE_2_FK on JOURNALIERE (
ID_BILAN ASC
);

/*==============================================================*/
/* Table : MENSUELLE                                            */
/*==============================================================*/
create table MENSUELLE 
(
   ID_BILAN             integer                        not null,
   ID_MENSUEL           integer                        not null,
   DATE_DEB_BILAN       timestamp                      not null,
   DATE_FIN_BILAN       timestamp                      not null,
   QUANTITE_TOTAL_HISTORISEM float                          not null,
   MONTANT_TOTAL_HISTORISEM float                          not null,
   constraint PK_MENSUELLE primary key (ID_BILAN, ID_MENSUEL)
);

/*==============================================================*/
/* Index : MENSUELLE_PK                                         */
/*==============================================================*/
create unique index MENSUELLE_PK on MENSUELLE (
ID_BILAN ASC,
ID_MENSUEL ASC
);

/*==============================================================*/
/* Index : HERITAGE_3_FK                                        */
/*==============================================================*/
create index HERITAGE_3_FK on MENSUELLE (
ID_BILAN ASC
);

/*==============================================================*/
/* Table : OFFRE_PROMOTIONNELLE                                 */
/*==============================================================*/
create table OFFRE_PROMOTIONNELLE 
(
   IDOP                 integer                        not null,
   DATE_SAUVEGARDE      timestamp                      not null,
   DATE_FIN_SAUVEGARDE  timestamp                      not null,
   CODE_PROMOTION       numeric(10)                    not null,
   POURCENTAGEOP        float                          null,
   constraint PK_OFFRE_PROMOTIONNELLE primary key (IDOP)
);

/*==============================================================*/
/* Index : OFFRE_PROMOTIONNELLE_PK                              */
/*==============================================================*/
create unique index OFFRE_PROMOTIONNELLE_PK on OFFRE_PROMOTIONNELLE (
IDOP ASC
);

/*==============================================================*/
/* Table : OFFRE_REDUCTIONNELLE                                 */
/*==============================================================*/
create table OFFRE_REDUCTIONNELLE 
(
   ID_OFFREREDUC        integer                        not null,
   DATE_DEB_REDUC       timestamp                      not null,
   DATE_FIN_REDUC       date                           not null,
   POURCENTAGEOR        float                          not null,
   constraint PK_OFFRE_REDUCTIONNELLE primary key (ID_OFFREREDUC)
);

/*==============================================================*/
/* Index : OFFRE_REDUCTIONNELLE_PK                              */
/*==============================================================*/
create unique index OFFRE_REDUCTIONNELLE_PK on OFFRE_REDUCTIONNELLE (
ID_OFFREREDUC ASC
);

/*==============================================================*/
/* Table : PANIER                                               */
/*==============================================================*/
create table PANIER 
(
   IDPANIER             integer                        not null,
   ID_CLIENT            integer                        not null,
   MONTANT_TTC          float                          null,
   STATUT_PANIER        varchar(10)                     not null,
   QUANTITE_PANIER      integer                        not null,
   A_REDUCTION          smallint                       null,
   DATE_COMMANDE        date                           null,
   constraint PK_PANIER primary key (IDPANIER),
   CONSTRAINT STATUS_PANIER
CHECK(STATUS_PANIER IN ('EN COURS', 'VALIDE', 'VIDE'))

);
 

/*==============================================================*/
/* Index : PANIER_PK                                            */
/*==============================================================*/
create unique index PANIER_PK on PANIER (
IDPANIER ASC
);

/*==============================================================*/
/* Index : APPARTIENT_FK                                        */
/*==============================================================*/
create index APPARTIENT_FK on PANIER (
ID_CLIENT ASC
);

/*==============================================================*/
/* Table : PRIX_PRODUIT                                         */
/*==============================================================*/
create table PRIX_PRODUIT 
(
   ID_PRIX              integer                        not null,
   PRIX                 float                          null,
   constraint PK_PRIX_PRODUIT primary key (ID_PRIX)
);

/*==============================================================*/
/* Index : PRIX_PRODUIT_PK                                      */
/*==============================================================*/
create unique index PRIX_PRODUIT_PK on PRIX_PRODUIT (
ID_PRIX ASC
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT 
(
   ID_PROD              integer                        not null,
   ID_OFFREREDUC        integer                        null,
   IDOP                 integer                        null,
   ID_CATPROD           integer                        not null,
   NOM_PROD             varchar(30)                    not null,
   A_REDUCTION          smallint                       not null,
   constraint PK_PRODUIT primary key (ID_PROD)
);

/*==============================================================*/
/* Index : PRODUIT_PK                                           */
/*==============================================================*/
create unique index PRODUIT_PK on PRODUIT (
ID_PROD ASC
);

/*==============================================================*/
/* Index : APPARTENIR_FK                                        */
/*==============================================================*/
create index APPARTENIR_FK on PRODUIT (
ID_CATPROD ASC
);

/*==============================================================*/
/* Index : ESTPROPOSER2_FK                                      */
/*==============================================================*/
create index ESTPROPOSER2_FK on PRODUIT (
IDOP ASC
);

/*==============================================================*/
/* Index : CONCERNER_FK                                         */
/*==============================================================*/
create index CONCERNER_FK on PRODUIT (
ID_OFFREREDUC ASC
);

alter table AUTHENTIFICATIONCLIENT
   add constraint FK_AUTHENTI_AVOIR3_CLIENT foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT)
      on update restrict
      on delete restrict;

alter table AVOIR
   add constraint FK_AVOIR_AVOIR_PRODUIT foreign key (ID_PROD)
      references PRODUIT (ID_PROD)
      on update restrict
      on delete restrict;

alter table AVOIR
   add constraint FK_AVOIR_AVOIR4_PANIER foreign key (IDPANIER)
      references PANIER (IDPANIER)
      on update restrict
      on delete restrict;

alter table AVOIR
   add constraint FK_AVOIR_AVOIR6_PRIX_PRO foreign key (ID_PRIX)
      references PRIX_PRODUIT (ID_PRIX)
      on update restrict
      on delete restrict;

alter table AVOIR1
   add constraint FK_AVOIR1_AVOIR1_CLIENT foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT)
      on update restrict
      on delete restrict;

alter table AVOIR1
   add constraint FK_AVOIR1_AVOIR5_ADRESSE foreign key (ID_ADRESSE)
      references ADRESSE (ID_ADRESSE)
      on update restrict
      on delete restrict;

alter table CLIENT
   add constraint FK_CLIENT_AVOIR2_AUTHENTI foreign key (LOGIN)
      references AUTHENTIFICATIONCLIENT (LOGIN)
      on update restrict
      on delete restrict;

alter table ESTPROPOSER1
   add constraint FK_ESTPROPO_ESTPROPOS_CLIENT foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT)
      on update restrict
      on delete restrict;

alter table ESTPROPOSER1
   add constraint FK_ESTPROPO_ESTPROPOS_OFFRE_RE foreign key (ID_OFFREREDUC)
      references OFFRE_REDUCTIONNELLE (ID_OFFREREDUC)
      on update restrict
      on delete restrict;

alter table EST_RETIRER
   add constraint FK_EST_RETI_EST_RETIR_HORAIRER foreign key (IDHORAIRER)
      references HORAIRERETRAIT (IDHORAIRER)
      on update restrict
      on delete restrict;

alter table EST_RETIRER
   add constraint FK_EST_RETI_EST_RETIR_PANIER foreign key (IDPANIER)
      references PANIER (IDPANIER)
      on update restrict
      on delete restrict;

alter table HEBDOMADAIRE
   add constraint FK_HEBDOMAD_HERITAGE__BILAN foreign key (ID_BILAN)
      references BILAN (ID_BILAN)
      on update restrict
      on delete restrict;

alter table HISTORISER
   add constraint FK_HISTORIS_HISTORISE_PANIER foreign key (IDPANIER)
      references PANIER (IDPANIER)
      on update restrict
      on delete restrict;

alter table HISTORISER
   add constraint FK_HISTORIS_HISTORISE_BILAN foreign key (ID_BILAN)
      references BILAN (ID_BILAN)
      on update restrict
      on delete restrict;

alter table JOURNALIERE
   add constraint FK_JOURNALI_HERITAGE__BILAN foreign key (ID_BILAN)
      references BILAN (ID_BILAN)
      on update restrict
      on delete restrict;

alter table MENSUELLE
   add constraint FK_MENSUELL_HERITAGE__BILAN foreign key (ID_BILAN)
      references BILAN (ID_BILAN)
      on update restrict
      on delete restrict;

alter table PANIER
   add constraint FK_PANIER_APPARTIEN_CLIENT foreign key (ID_CLIENT)
      references CLIENT (ID_CLIENT)
      on update restrict
      on delete restrict;

alter table PRODUIT
   add constraint FK_PRODUIT_APPARTENI_CATEGORI foreign key (ID_CATPROD)
      references CATEGORIEPRODUIT (ID_CATPROD)
      on update restrict
      on delete restrict;

alter table PRODUIT
   add constraint FK_PRODUIT_CONCERNER_OFFRE_RE foreign key (ID_OFFREREDUC)
      references OFFRE_REDUCTIONNELLE (ID_OFFREREDUC)
      on update restrict
      on delete restrict;

alter table PRODUIT
   add constraint FK_PRODUIT_ESTPROPOS_OFFRE_PR foreign key (IDOP)
      references OFFRE_PROMOTIONNELLE (IDOP)
      on update restrict
      on delete restrict;
