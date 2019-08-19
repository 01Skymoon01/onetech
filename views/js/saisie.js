    function colorish(champ, erreur)
    {
    if(erreur)
      champ.style.backgroundColor = "#fba";
    else
      champ.style.backgroundColor = "";
    }


    function verifnom(champ)

    {
            var regex = /[a-zA-Z]/;
        if(!regex.test(champ.value) || champ.value.length < 4 || champ.value.length > 25)

        {

        colorish(champ, true);

        return false;

        }

        else

        {

         colorish(champ, false);

         return true;

        }

    }


    function verifPrenom(champ)

    {
            var regex = /[a-zA-Z]/;
        if(!regex.test(champ.value) || champ.value.length < 4 || champ.value.length > 25)

        {

        colorish(champ, true);

        return false;

        }

        else

        {

         colorish(champ, false);

         return true;

        }

    }

    function verifCPU(champ)

    {
            var regex = /[a-zA-Z]/;
        if(!regex.test(champ.value) || champ.value.length < 4 || champ.value.length > 25)

        {

        colorish(champ, true);

        return false;

        }

        else

        {

         colorish(champ, false);

         return true;

        }

    }

    function verifRAM(champ)
    {
        var regex = /[0-9.,]/;
        var prix = parseInt(champ.value);

   if(!regex.test(champ.value) || champ.value.length < 2 || champ.value.length > 5 || isNaN(prix))

      {

      colorish(champ, true);

      return false;

       }

   else

       {

      colorish(champ, false);

      return true;

       }

    }



   function verifform()

{
        var nom = document.getElementById('nom');

        var prenom = document.getElementById('prenom');
        var ram = document.getElementById('RAM');
        var cpu = document.getElementById('cpu');


        var NomOk = verifnom(nom);

        var prenomOk = verifprix(prenom);

        var ramOK = verifRAM(ram);

        var CPUOk = verifCPU(cpu);


        if(prenomOk && NomOk && ramOK && CPUOK)

      {
        alert("Table Mise a Jour !");
        return true;
      }

   else

     {

      alert("Veuillez remplir correctement tous les champs");

      return false;

   }


}

    function verifLog(champ)
    {
        if(champ.value.length < 4 || champ.value.length > 25)
        {
            colorish(champ, true);
            return false;
        }
        else
        {
            colorish(champ, false);
            return true;
        }
    }

    function verifMail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ.value))
        {
            colorish(champ, true);
            return false;
        }
        else
        {
            colorish(champ, false);
            return true;
        }
    }


    function verifformAdmin() {
        //var id = document.getElementById('idadmin');
        var log = document.getElementById('logadmin');
        //var mdp = document.getElementById('mdpadmin');
        var mail = document.getElementById('mail');

        //var idok = verifnum(id);

        var logok = verifLog(log);

        var mailOk = verifMail(mail);

        if (logok && mailOk) {
            alert("Table Mise a Jour !");
            return true;
        } else {

            alert("Veuillez remplir correctement tous les champs");

            return false;

        }
    }
