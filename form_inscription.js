
//fonction permettant de surligner en rouge en cas d'erreur
function surligne(champ, erreur)
{
   if(erreur){
      champ.style.backgroundColor = "#FF0000";
      }
   else {
      champ.style.backgroundColor = "";
      }
}
//fonction permettant de verifier le niveau de securité du mot de passe
function securityMdp(champ, niveau)
{
   if(niveau==1) {
      champ.style.backgroundColor = "#FF0000";
      return false;
  }
   if(niveau==2){
      champ.style.backgroundColor = "#FFFF00";
      return true}
  if(niveau==3){
      champ.style.backgroundColor = "#00FF00";
  }
}
//fonction permettant de verifier le nombre de caractere dans le login
function verifLogin(champ)
{
   if(champ.value.length < 4)
    	{
      surligne(champ, true);
      verif=0;
   }
   else
   {
      surligne(champ, false);
      verif=1;
   }
}
//fonction permettant de verifier le format du mail
function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      verif2=0;
   }
   else
   {
      surligne(champ, false);
      verif2=1;
   }
}
//fonction permettant de verifier le nombre de caractere dans le mot de passe
function verifMdp(champ)
{
   if(champ.value.length < 4)
   {
   	      verif3=0;
      securityMdp(champ,1);
   }
      if((champ.value.length >= 4) && (champ.value.length <= 8))
 {
 	      verif3=1;
      securityMdp(champ,2);
   }
      if(champ.value.length >8) 
 {
 	      verif3=1;
      securityMdp(champ,3);
   }
}
//fonction permettant de la confirmation du mot de passe
function confirmationMdp(champ1,champ){
	if(champ1.value!=champ.value){
		      verif4=0;
	  champ.style.backgroundColor = "#FF0000";
}
	else{
		      verif4=1;
	  champ.style.backgroundColor = "";
}
}
//fonction permettatnt de verifier si l'ensemble des champs respectent les normes determinées
function verifForm(){
	if (verif==0) {
		   alert("Veuillez Verifier les informations ins!");
		   return false
	}
	if (verif3==0) {
		   alert("Veuillez verifier le mot de passe!");
		   return false
	}
	if (verif2==0) {
		   alert("Veuillez Entrer un email valide!");
		   return false
	}
	if (verif4==0) {
		   alert("Veuillez verifier la confirmation de mot de passe!");
		   return false
	}

}

