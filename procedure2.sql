CREATE PROCEDURE `changement_prix`(IN `idOP` INT, IN `idprod` INT) NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER BEGIN SET @pourcentange= (SELECT pourcentageOP from offre_promotionnelle where idOP=@idOP); SET @prix=(select prix from prix_produit as p INNER JOIN avoir as a on p.id_prix=a.id_prix INNER JOIN produit as pr on a.id_prod=pr.id_prod where id_prod='@idprod'); SET @nouveau=@prix-((@prix*@pourcentange)/100); UPDATE produit set a_reduction=1,id_op=@idOP Where id_produit=@idprod; UPDATE prix_produit set prix=@nouveau where id_prod=idprod; END