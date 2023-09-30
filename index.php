<?php get_header('post');?>

    <?php //get_template_part('includes/section', 'blogajax'); ?>

    
 <?php 
 
 /* spl_autoload_register(function($class){
    include 'inc/'. $class . '.php';
 }); */


 if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){
   require_once(dirname(__FILE__). '/vendor/autoload.php');
 }

 use Starwebfront\test\Student;
 use Starwebfront\Test;
 use Starwebfront\Person;

 use Starwebfront\MySingleton;


 $singletonPattern = MySingleton::getInstance();

 $singletonPattern->doSomething();


 

 //new Student();
 Student::check();
  new Person();

 $test = new Test();

 $test->msg1(); 

 
 ?>
<?php get_footer();?>

