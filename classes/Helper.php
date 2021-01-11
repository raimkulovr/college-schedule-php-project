<?php
class Helper {
   public static function clearString($str){
        return trim(strip_tags($str));
   } 

   public static function clearInt($str){
        return (int)$str;
   }

   public static function printSelectOptions($key, array $options){
     if ($options) {
          foreach ($options as $option) { ?>
          <option value="<?=$option['id'];?>" <?=($key == $option['id'])?'selected':'';?>><?=$option['value'];?></option>
          <?php }
     }
   }

   public static function paginator($count, $current=1, $size=30){
     $numPages=ceil($count/$size);
     $href = $_SERVER['PHP_SELF'].'?page=';
     echo '<ul class="pagination ">';
     for ($i = 1; $i<=$numPages; $i++) {
          if ($current == $i) {
               echo ' <li class="paginate_button active"><a href="'.$href.$i.'" data-dt-idx="'.$i.'"tabindex="0">'.$i.'</a></li>';
          } else {
               echo ' <li class="paginate_button"><a href="'.$href.$i.'" data-dt-idx="'.$i.'"tabindex="0">'.$i.'</a></li>';
          }
     }
     echo '</ul>';
   }
   public static function setFlash($message=''){
     $_SESSION['flash'] = $message;
   }
   public static function getFlash(){
     $msg = $_SESSION['flash'];
     $_SESSION['flash'] = '';
     return $msg;
   }
   public static function hasFlash(){
     return (!empty($_SESSION['flash'])) ? true : false;
   }
   public static function can($role){
     return ($role === $_SESSION['role'])? true : false;
   }
}