create procedure generer_bilan(IN idPanier int,IN motant_panier float,
 	IN motant float,
	IN	quantite int,
	IN	dateDuJour timestamp,
	IN	id_bilan int,
	IN	date_fin timestamp,
	IN	last_id_bilan int)
begin

	IF EXISTS (SELECT * from bilan as b INNER JOIN journaliere as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		BEGIN
		@quantite=SELECT quantite_panier from bilan as b INNER JOIN journaliere as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@motant=SELECT motant_panier from bilan as b INNER JOIN journaliere as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@id_bilan=SELECT motant_panier from bilan as b INNER JOIN journaliere as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan		
		UPDATE bilan SET quantite_panier=@quantite,montant_total=@motant where id_bilan=@id_bilan
				INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_panier,@id_bilan)
		END
	ELSE
			@date_fin=dateDuJour+
		BEGIN
		INSERT INTO bilan(montant_total,date_deb_bilan,date_fin_bilan) VALUES (@motant_panier,dateDuJour)
		SELECT id_bilan FROM bilan where id_bilan=MAX(id_bilan)
		INSERT INTO journaliere (id_bilan) VALUES (@last_id_bilan)
		INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_panier,@id_bilan)

		END
	IF EXISTS (SELECT * from bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		BEGIN
		@quantite=SELECT quantite_panier from bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@motant=SELECT motant_panier from bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@id_bilan=SELECT motant_panier from bilan as b INNER JOIN mensuelle as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan		
		UPDATE bilan SET quantite_panier=@quantite,montant_total=@motant where id_bilan=@id_bilan
				INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_panier,@id_bilan)

		END
	ELSE
			@date_fin=dateDuJour+
		BEGIN
		INSERT INTO bilan(montant_total,date_deb_bilan,date_fin_bilan) VALUES (@motant_panier,dateDuJour)
		SELECT id_bilan FROM bilan where id_bilan=MAX(id_bilan)
		INSERT INTO mensuelle (id_bilan) VALUES (@last_id_bilan)
				INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_panier,@last_id_bilanid_bilan)
		END
	IF EXISTS (SELECT * from bilan as b INNER JOIN hebdomadaire as h on b.id_bilan=h.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan)
		BEGIN
		@quantite=SELECT quantite_panier from bilan as b INNER JOIN hebdomadaire as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@motant=SELECT motant_panier from bilan as b INNER JOIN hebdomadaire as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan
		@id_bilan=SELECT motant_panier from bilan as b INNER JOIN hebdomadaire as m on b.id_bilan=m.id_bilan where getDate()<=date_deb_bilan and getDate()>date_deb_bilan		
		UPDATE bilan SET quantite_panier=@quantite,montant_total=@motant where id_bilan=@id_bilan
				INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_panier,@id_bilan)
		END
	ELSE
			@date_fin=dateDuJour+
		BEGIN
		INSERT INTO bilan(montant_total,date_deb_bilan,date_fin_bilan) VALUES (@motant_panier,dateDuJour)
		SELECT id_bilan FROM bilan where id_bilan=MAX(id_bilan)
		INSERT INTO hebdomadaire (id_bilan) VALUES (@last_id_bilan)
		INSERT INTO historiser(idPanier,id_bilan) VALUES (@id_bilan,@last_id_bilanid_bilan)

		END
END