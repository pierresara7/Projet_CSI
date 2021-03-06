CREATE DEFINER=`root`@`localhost` TRIGGER `ti_offre` AFTER INSERT ON `offre_promotionnelle` FOR EACH ROW 
BEGIN 
SET @idOP= (SELECT idOP from inserted); SET @pourcentange= (SELECT pourcentageOP from inserted); 
SET @prix=(select prix from prix_produit as p INNER JOIN avoir as a on p.id_prix=a.id_prix INNER JOIN produit as pr on a.id_prod=pr.id_prod where id_prod='@id_pro'); 
SET @nouveau=@prix-((@prix*@pourcentange)/100); UPDATE produit set a_reduction=1,id_op=@id_OP Where id_produit=@id_prod; UPDATE prix_produit set prix=nouveau; 
END

CREATE TRIGGER `ti_adresse` AFTER INSERT ON `adresse` FOR EACH ROW BEGIN
SET @idClient=(SELECT MAX(id_Client) FROM Client);
SET @idAdr=(SELECT id_adresse from inserted);
INSERT INTO avoir1 (id_Client,id_adresse) VALUES('@idClient','@idAdr');
END

CREATE TRIGGER `ti_client` AFTER INSERT ON `client` FOR EACH ROW BEGIN
SET @idClient=(SELECT MAX(id_Client) FROM Client);
SET @login=(SELECT login from client where id_client='@idClient');
SET @nb=(SELECT COUNT(*) > 0 FROM authentificationclient WHERE login='@login')
if @nb>0
then
	roolback;
END IF;
END
    
    
    
