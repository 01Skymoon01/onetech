<?php
class panier{
  private $idCC;
  public function __construct()
  {

    if(!isset($_SESSION))
    {
      session_start();//initiliser la session

    }
    /*  if(isset($_POST['panier']['qte']))
    {
    $this->recalculer();
      /*$i=0;
      //$_POST['panier']['qte']
      foreach($_SESSION["panier"] as $keys => $values)
    {
         //Recharche du produit dans le panier
          if($values['item_id'] == 1){
           $i++;
            // $values['item_quantity'] = $_POST['panier']['qte'][1] ;
          }

      }
        var_dump( $_SESSION['panier']);
        //var_dump($values['item_quantity']);
        var_dump($i);
        //var_dump($_POST['panier']['qte'][1]);

        //var_dump($val);
         //var_dump( $_SESSION['panier']);
         //var_dump($values['item_quantity']);
        //var_dump($i);

    }*/



}


public function Total_nbforheadher()
{
 $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 $total=0 ;

 $i = count($_SESSION["panier"]);// HOT NBR DE PRODUITS§§£££££££££££££££££££££££££££££££££££££££££££££££££££££££
 foreach ($_SESSION['panier'] as &$player) {
   if ($player["item_id"] == $i) {

      $total ++;
      /*?><p>TOTAL= <?php  echo $total ?> </p>
      <?php*/
   }
   $i--;

 }
  //var_dump($val);
  //var_dump( $_SESSION['panier']);
  //var_dump($values['item_quantity']);
  //var_dump($i);
   return $total;
}
public function count()
{
  if(isset($_SESSION["panier"]))
  {
  return count($_SESSION["panier"]);
  }
  else return 0;
}

  public function add($product_id,$product_name,$product_price)
  {

	if(isset($_SESSION["panier"]))
	{
		$item_array_id = array_column($_SESSION["panier"], "item_id");
		if(!in_array($product_id, $item_array_id))
		{
			$count = count($_SESSION["panier"]);
			$item_array = array(
				'item_id'			=>	$product_id,
				'item_name'			=>	$product_name,
				'item_price'		=>	$product_price,
				'item_quantity'		=>	1
			);
			$_SESSION["panier"][$count] = $item_array;
      return true;
		}
		else
		{
      return false;
		}
	}
	else
	{
		$item_array = array(
      'item_id'			=>	$product_id,
      'item_name'			=>	$product_name,
      'item_price'		=>	$product_price,
      'item_quantity'		=>	1
		);
		$_SESSION["panier"][0] = $item_array;
    return true;
	}
}

 public function delete($product_id)
{

  foreach($_SESSION["panier"] as $keys => $values)
		{
			if($values["item_id"] == $product_id)
			{
				unset($_SESSION["panier"][$keys]);
				return true;
			}

     }


  }

   public function recalculer($tab)
  {
    $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
    unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
    $total=0 ;
    $val= 0 ;
    $i = 0;// HOT NBR DE PRODUITSNNNOURRRRR§§£££££££££££££££££££££££££££££££££££££££££££££££££££££££
    var_dump($_SESSION['panier']);
    var_dump($tab);


    foreach ($tab as $key  => $value){
    foreach ($_SESSION['panier'] as &$player) {
      if ($player["item_id"] == $key) {

        $val=(int)$value;

        $player["item_quantity"] = $val;
         $total = $total + ($player["item_quantity"] * $player["item_price"]);

      }
      var_dump($player["item_id"]);
      ?><p>TOTAL= <?php  echo $total; ?> </p>
      <?php

      $i++;

    }
  }
    //var_dump($val);

     //var_dump($values['item_quantity']);
    //var_dump($i);
      return $total;
  }
  public function Total_nb($tab)
 {
   $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
   unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
   $total=0 ;

   $i = count($_SESSION["panier"]);// HOT NBR DE PRODUITS§§£££££££££££££££££££££££££££££££££££££££££££££££££££££££
   foreach ($_SESSION['panier'] as &$player) {


        $total ++;
        /*?><p>TOTAL= <?php  echo $total ?> </p>
        <?php*/

     $i--;

   }
    //var_dump($val);
    //var_dump( $_SESSION['panier']);
    //var_dump($values['item_quantity']);
    //var_dump($i);
     return count($_SESSION["panier"]);
 }

  public function Total_QTE($tab)
 {
   $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
   unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
   $total=0 ;


   foreach ($_SESSION['panier'] as &$player) {


        $total = $total + ($player["item_quantity"]);
        /*?><p>TOTAL= <?php  echo $total ?> </p>
        <?php*/



   }

    //var_dump($val);
    //var_dump( $_SESSION['panier']);
    //var_dump($values['item_quantity']);
    //var_dump($i);
     return $total;
 }

 public function listeQTE($tab)
{
  $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
  unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
  $total= array();
  $val= 0 ;

  foreach ($tab as $key  => $value){
  foreach ($_SESSION['panier'] as &$player) {
    if ($player["item_id"] == $key) {

       array_push($total,(int)$value);

    }


  }
}

   //var_dump( $_SESSION['panier']);
   //var_dump($values['item_quantity']);
  //var_dump($i);
    return $total;
}


public function listePrix($tab)
{
 $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 $total= array();
 $val= 0 ;


 foreach ($_SESSION['panier'] as &$player) {

    $val= (float)$player["item_price"] ;
      array_push($total,$val);

   }




 var_dump($total);
 ?><p> *****listePrix**** </p>
 <?php
  //var_dump( $_SESSION['panier']);
  //var_dump($values['item_quantity']);
 //var_dump($i);
   return $total;
}


public function listeNom($tab)
{
 $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 $total= array();
 $val= 0 ;

 foreach ($_SESSION['panier'] as &$player) {

    $val= (string)$player["item_name"] ;
      array_push($total,$val);


 }
 var_dump($total);
 ?><p> *****listeNom**** </p>
 <?php
  //var_dump( $_SESSION['panier']);
  //var_dump($values['item_quantity']);
 //var_dump($i);
   return $total;
}


public function listeID($tab)
{
 $_SESSION["commande"]=array(); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 unset($_SESSION["commande"]); //****TANSECHHHHHHHHHHHHHHHHHHH!!
 $total= array();
 $val= 0 ;

 foreach ($tab as $key => $player) {


      array_push($total,(int)$key);


 }
 var_dump($total);
 ?><p> *****listeID**** </p>
 <?php
  //var_dump( $_SESSION['panier']);
  //var_dump($values['item_quantity']);
 //var_dump($i);
   return $total;
}


  public function addCommandeVirtuelle($listeC)
  {
    //unset($_SESSION["commande"]);
    $i=count($_SESSION["panier"]);
    foreach ($listeC as $key => $value) {


          $_SESSION["commande"][$i] = $value;
          //var_dump($_SESSION["commande"][$i]);



    $i--;
  }
}
/*
  $item_array = array(
    'item_id'			=>	$listeC[':id_commande'],
    'item_name'			=>	$listeC[':id_client'],
    'item_price'		=>	$listeC[':date_commande'],
    'item_quantity'		=>	$listeC[':nbProduit_commande']
  );
  $_SESSION["panier"][0] = $item_array;*/
  // var_dump($_SESSION["commande"]);


 public function IDCCourant($Cid)
{
  $this->idCC=$Cid;
}
public function GetIDCCourant()
{
 return $this->idCC;
}



/******************************************************************************
*********************************************************************************
*************************LOCATION****************************************************
**************************************************************************************/


public function deleteLocation($product_id)
{

  foreach($_SESSION["location"] as $keys => $values)
		{
			if($values["item_id"] == $product_id)
			{
				unset($_SESSION["location"][$keys]);
				return true;
			}
     }
  }


public function addlocation($product_id,$product_name,$product_price)
{
if(isset($_SESSION["location"]))
{
  $item_array_id = array_column($_SESSION["location"], "item_id");
  if(!in_array($product_id, $item_array_id))
  {
    $count= count($_SESSION["location"]);
    $item_array = array(
      'item_id'			=>	$product_id,
      'item_name'			=>	$product_name,
      'item_price'		=>	$product_price,
      'item_quantity'		=>	1
    );
    $_SESSION["location"][$count] = $item_array;
    return true;
  }
  else
  {
    return false;
  }
}
else
{
  $item_array = array(
    'item_id'			=>	$product_id,
    'item_name'			=>	$product_name,
    'item_price'		=>	$product_price,
    'item_quantity'		=>	1
  );
  $_SESSION["location"][0] = $item_array;
  return true;
}
}




}

?>
