Create trigger ti_avoir on prix for insert as
BEGIN
DECLARE @id_prod
SELECT @id_prod=id_prod FROM produit where id_prod=MAX(id_prod)
SELECT @id_prix=id_prix FROM inserted
INSERT INTO avoir(id_prod,id_prix) VALUES (@id_prod,@id_prix)
END 