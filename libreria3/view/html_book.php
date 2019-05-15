<?php
  function HTML_bookText1(){
    echo <<< HTML
      <p>Investigación muy exhaustiva y mediante un análisis innovador, Allan y Barbara Pease interpretan las estadísticas y la fisiología relacionadas con el sexo en una lectura amena que nos descubre por qué los hombres quieren sexo y las mujeres necesitan amor. Este libro va dirigido a todos aquellos que quieran disfrutar al máximo sus relaciones y proporciona respuestas, que tanto hombres como mujeres, deben conocer.</p>
    HTML;
  }
  function HTML_bookText2(){
    echo <<< HTML
      <p>Descubra lo que sus gestos dicen de usted y de las personas que le rodean y saque el máximo partido al lenguaje no verbal para conseguir sus objetivos. El lenguaje del cuerpo dice mucho de las personas, tanto o más que las palabras. Según cuáles sean nuestros gestos, podemos mostrar evidencias de que nos sentimos inseguros, incómodos, molestos, desconfiados, decididos, fuertes o complacientes. No nos da la misma impresión alguien que nos ofrece un buen apretón de manos que quien se limita a tendernos la mano con ligereza. Las señales que ofrece una persona que se apoltrona en su sillón no son las mismas que las que muestra la que se sienta en un extremo de la silla. La manera cómo cruzamos los brazos, movemos las manos, fijamos la mirada dice mucho de nosotros y al mismo tiempo nos ayuda a causar una impresión positiva en los demás, a averiguar si alguien miente, a conseguir la cooperación de los demás, a salir con éxito de una entrevista de trabajo o negocios o incluso a seducir a otras personas, ya sea para encontrar pareja o para persuadirles. Allan y Barbara Pease son expertos reconocidos internacionalmente en relaciones humanas y lenguaje del cuerpo. Los más de veinte millones de libros que llevan vendidos los han convertido en autores conocidos en todo el mundo.</p>
    HTML;
  }
  function HTML_bookText3(){
    echo <<< HTML
      <p>«Si conoces al enemigo y a ti mismo, tu victoria será segura; si conoces el Cielo y conoces la Tierra, puedes lograr que tu victoria sea completa». El arte de la guerra es el más reconocido tratado de estrategia militar de todos los tiempos. A pesar de haber sido escrito, presumiblemente, en el siglo V a.C., las ideas estipuladas por Sun Tzu mantienen plena vigencia y actualidad, puesto que los trece capítulos que componen la presenta obra transmiten una sabiduría difícilmente superable.Las enseñanzas de este libro son aplicables a todos aquellos ámbitos de la vida en los que los conflictos y las contradicciones tienen un especial protagonismo, como la política, la economía, la filosofía, las leyes o la psicología, entre otros, lo que lo convierte en un magnífico compendio de conocimiento de la naturaleza humana.«Librar y ganar todas las batallas no implica la excelencia suprema. La excelencia suprema consiste en romper la resistencia enemiga sin combatir». «El arte de la guerra debe ser valorado a partir de cinco factores constantes que se han de tomar en cuenta durante las deliberaciones previas a la determinación de las condiciones en el campo de batalla:- La Ley Moral - El Cielo- La Tierra - El Comandante- El Método y la Disciplina». «El general que siga mi consejo y actúe en consecuencia vencerá...».</p>
    HTML;
  }
  function HTML_bookText4(){
    echo <<< HTML
      <p>Todavía existen cuestiones que llevan siglos confundiendo a hombres y mujeres. Allan y Barbara Pease se sirven de los descubrimientos científicos sobre el cerebro, los estudios sobre los cambios sociales, la biología evolutiva y la psicología para enseñarte a sacar el máximo provecho a tus relaciones o, como mínimo, empezar a comprender de qué planeta viene tu pareja. Un libro con altas dosis de humor, ejemplos concretos y un sinfín de datos estadísticos, que muestra por qué los hombres y las mujeres son diferentes, haciendo especial hincapié en que esta diferencia puede convertirse en la base sólida de un gran amor.</p>
    HTML;
  }
  function HTML_bookTextx($book){
    switch($book){
      case "11":HTML_bookText1();break;
      case "22":HTML_bookText2();break;
      case "33":HTML_bookText3();break;
      case "44":HTML_bookText4();break;
    }
  }
?>
