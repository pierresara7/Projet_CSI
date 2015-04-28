SET @idOP= (SELECT idOP from inserted);
SET @pourcentange= (SELECT pourcentageOP from inserted);
SET @prix=select prix from prix_produit as p INNER JOIN avoir as a on p.id_prix=a.id_prix INNER JOIN produit as pr on a.id_prod=pr.id_prod
where id_prod='@id_pro';
SET @nouveau=@prix-((@prix*@pourcentange)/100);
UPDATE produit set a_reduction=1,id_op=@id_OP Where id_produit=@id_prod;
UPDATE prix_produit set prix=nouveau;
