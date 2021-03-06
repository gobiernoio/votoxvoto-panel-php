angular.module('panelnezapp.services', [])

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY miFIREBASE
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('miFirebase', function($firebaseArray) {


  // var config = {
  //   apiKey: "AIzaSyCCQdp9TiHW6bRWqsqUNckHMeI-uTVt7vE",
  //   authDomain: "firebase-escaneame.firebaseapp.com",
  //   databaseURL: "https://escaneame.firebaseio.com", 
  //   storageBucket: "gs://firebase-escaneame.appspot.com"
  // };

  var config = {
    apiKey: "AIzaSyAF5l1DfB5QF3FfGfp6HeEf_eEZVQbBO58",
    authDomain: "nezapp.firebaseapp.com",
    databaseURL: "https://nezapp.firebaseio.com",
    storageBucket: "project-8647383937695665487.appspot.com",
    messagingSenderId: "839553948433"
  };

  firebase.initializeApp(config);

  return {
    all: function() {
      return firebase.database().ref();
    }, 
    sesion: function() {
      var provider = new firebase.auth.FacebookAuthProvider();
      return provider;
    }, 
    archivos: function() {
      return firebase.storage().ref();
    }, 
    referencia: function(referencia) {
        //regresamos el jason con $firebasearray
        return $firebaseArray(  firebase.database().ref().child(referencia)  ).$loaded().then( function(data) {
          return data;
        });
    }
  };


})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY DATOS PERSONALES
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======

.factory('Usuario', function() {
  return {
    valor: function(param) {
        var miValor = window.localStorage[param];
        if(miValor) {
          return miValor;
        }
        else {
          return null;
        }
        
    }
  }
})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY CANALES
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('Canales', function($firebaseArray, miFirebase) {
  //genramos una instancia de directorio en base a miFirebase que ya tiene conecci??n a la base de datos
  var getCanales = miFirebase.all().child('canales');
  //regresamos el jason con $firebasearray
  return $firebaseArray(getCanales).$loaded().then( function(data) {
    return data;
  });
})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY MISCHATS
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('MisChats', function($firebaseArray, miFirebase) {
  //En return con all regresamos los canales con get el canal en especifico.
  return {
    chats: function(usuarioId) {
      //genramos una instancia de directorio en base a miFirebase que ya tiene conecci??n a la base de datos
      var getMisChats = miFirebase.all().child('usuarios/' + usuarioId + '/mischats/');
      //$firebaseArray coloca en array la informaci??n obtenida y la metemos en tel??fonos

      var refLimit = getMisChats.orderByChild("orden").limitToFirst(10);  
      //var scrollRef = getMisChats.util.Scroll(ref, 'orden');


      // return $firebaseArray(scrollRef).$loaded().then( function(data) {
      //   return data;
      // });


      return $firebaseArray(refLimit).$loaded().then( function(data) {
        return data;
      });
  
    }
  };
})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY DATOS EST??TICOS
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('DatosEstaticos', function() {
  // Un json por cada lista de datos que se necesitan.
  var cabildos = [{ id: 30, nombre: 'Juan Hugo de la Rosa Garc??a', puesto: 'Presidente Municipal', foto: 'img/cabildo/juanhugo.jpg'}, { id: 0, nombre: 'Maria Guadalupe P??rez Hern??ndez', puesto: '1er S??ndico', foto: 'img/cabildo/maria.jpg'}, { id: 1, nombre: 'Adolfo Cerqueda Rebollo', puesto: '2?? S??ndico', foto: 'img/cabildo/adolfo.jpg'}, { id: 2, nombre: 'Coralia Mar??a Luisa Villegas Romero', puesto: '3er S??ndico', foto: 'img/cabildo/coralia.jpg'}, { id: 3, nombre: 'Ver??nica Romero Tapia', puesto: '1er Regidor', foto: 'img/cabildo/veronica.jpg'}, { id: 4, nombre: 'Omar Nieves ??vila', puesto: '2?? Regidor', foto: 'img/cabildo/omar.jpg'}, { id: 5, nombre: 'Adolfina Garc??a Torres', puesto: '3er Regidor', foto: 'img/cabildo/adolfina.jpg'}, { id: 6, nombre: 'Mart??n Zepeda Hern??ndez', puesto: '4?? Regidor', foto: 'img/cabildo/martinz.jpg'}, { id: 7, nombre: 'Elia Cruz Solano', puesto: '5?? Regidor', foto: 'img/cabildo/elia.jpg'}, { id: 8, nombre: 'Francisco G??mez Altamirano', puesto: '6?? Regidor', foto: 'img/cabildo/francisco.jpg'}, { id: 9, nombre: 'Karina Stephany P??rez Carrillo', puesto: '7?? Regidor', foto: 'img/cabildo/karina.jpg'}, { id: 10, nombre: 'Alfredo Esquivel Ramos', puesto: '8?? Regidor', foto: 'img/cabildo/alfredo.jpg'}, { id: 11, nombre: 'Joaquina Navarrete Contreras', puesto: '9?? Regidor', foto: 'img/cabildo/joaquina.jpg'}, { id: 12, nombre: 'Jos?? De Jes??s Herrera Atilano', puesto: '10?? Regidor', foto: 'img/cabildo/jose.jpg'}, { id: 13, nombre: 'Sonia Macrina Mart??nez Quintana', puesto: '11?? Regidor', foto: 'img/cabildo/macrina.jpg'}, { id: 14, nombre: 'Alma Ang??lica Quiles Mart??nez', puesto: '12?? Regidor', foto: 'img/cabildo/alma.jpg'}, { id: 15, nombre: 'Omar Rodr??guez Cisneros', puesto: '13?? Regidor', foto: 'img/cabildo/omarr.jpg'}, { id: 16, nombre: 'Honoria Arellano Ocampo', puesto: '14?? Regidor', foto: 'img/cabildo/honoria.jpg'}, { id: 17, nombre: 'Israel Montoya', puesto: '15?? Regidor', foto: 'img/cabildo/israel.jpg'}, { id: 18, nombre: 'Josefina Hern??ndez', puesto: '16?? Regidor', foto: 'img/cabildo/josefina.jpg'}, { id: 19, nombre: 'Mart??n Cortez L??pez', puesto: '17?? Regidor', foto: 'img/cabildo/martinc.jpg'}, { id: 20, nombre: 'Blasa Estrada', puesto: '18?? Regidor', foto: 'img/cabildo/blasa.jpg'}, { id: 21, nombre: 'Antonio Zanabria Ortiz', puesto: '19?? Regidor', foto: 'img/cabildo/antonio.jpg'} ];
  var sitios = [{ id: 0, name: 'Cabeza de Coyote', resumen: 'La obra escult??rica denominada ???Cabeza de Coyote??? del artista Sebasti??n, de 40 metros de altura y un peso de 298 toneladas es considerada una de las obras m??s grandes no s??lo del estado de M??xico sino del pa??s y de Am??rica Latina. Se localiza en la glorieta que forman las avenidas Adolfo L??pez Mateos y Pantitl??n, se inici?? en el 2005 pero fue hasta el 23 de abril de 2008 cuando pudo ser inaugurada.', fotominiatura: 'img/sitios/coyote.jpg', fotogrande: 'img/sitios/grandes/coyote.jpg'}, { id: 1, name: 'Estadio Neza', resumen: 'El estadio ???Neza 86???, est?? situado en el interior de la Universidad Tecnol??gica de Nezahualc??yotl, fue inaugurado en 1981 como Estadio "Jos?? L??pez Portillo" y fue renombrado como "Neza 86" en el marco de la Copa Mundial de F??tbol de ese mismo a??o. Cuenta con una capacidad de 28.500 personas y est?? en proceso de remodelaci??n, en su historia cuenta con partidos realizados en la copa del mundo de M??xico 86.', fotominiatura: 'img/sitios/estadio.png', fotogrande: 'img/sitios/grandes/estadio.png'}, { id: 2, name: 'El Parque del Pueblo', resumen: 'El zool??gico Parque del Pueblo, est?? ubicado entre las calles de Linda Vista y S. Esteban, cuanta con un museo en el que se brinda informaci??n acerca de pieles y animales disecados, cuenta con un zool??gico y un lago donde se puede dar un paseo en lanchas.', fotominiatura: 'img/sitios/parque.jpg', fotogrande: 'img/sitios/grandes/parque.jpg'}, { id: 3, name: 'El Barquito', resumen: '???El barquito???, es uno de los principales iconos del municipio de Nezahualc??yotl, el pasado 18 de octubre se reinauguro despu??s de a??os de abandono, respetando el concepto del barquito que se construy?? hace 40 a??os, ahora cuenta con palmeras, pintura antigraffiti, palapas, areneros, juegos acu??ticos, iluminaci??n y bruma, siendo de nuevo el punto de encuentro de familias que disfrutan la diversi??n que les proporciona. Se ubica en Av. Chimalhuac??n.', fotominiatura: 'img/sitios/barco.jpg', fotogrande: 'img/sitios/grandes/barco.jpg'}, { id: 4, name: 'El Pulpo', resumen: '???El Pulpo???, este es un espacio de convivencia familiar por excelencia en el municipio, el pasado 22 de marzo, se reinaugur??, cuenta con juegos para los peque??os, adem??s de fuentes de agua potable reciclada para la diversi??n de los j??venes, el Parque Acu??tico El Pulpo es uno de los m??s de 70 espacios p??blicos que se recuperan en el municipio. Se localiza sobre Av. Pantitl??n.', fotominiatura: 'img/sitios/pulpo.jpg', fotogrande: 'img/sitios/grandes/pulpo.jpg'}, { id: 5, name: 'Parque Tem??tico Las Fuentes', resumen: 'Parque tem??tico Las Fuentes, es un espacio recuperado y transformado en un parque tem??tico sobre la Av. Bordo de Xochiaca, cuenta con 110 fuentes danzarinas e iluminaci??n, una ciudad a escala con carros el??ctricos y mec??nicos para fomentar la cultura vial en los ni??os, juegos infantiles y ??reas deportivas con cancha de futbol y basquetbol.', fotominiatura: 'img/sitios/lasfuentes.jpg', fotogrande: 'img/sitios/grandes/lasfuentes.jpg'}, { id: 6, name: 'El Palacio Municipal', resumen: 'Palacio Municipal de Nezahualc??yotl, es el centro vital del municipio, cuenta con 3 estatuas que dan la bienvenida a sus visitantes, la del Rey poeta Nezahualc??yotl, Moctezuma y Cuauht??moc, en su plaza se llevan a cabo actividades deportivas y culturales, es el marco de reuni??n para familias que conviven durante la tarde, donde los ni??os y j??venes pueden jugar y correr. Los fines de semana puedes encontrar puestos de antojitos, juegos, actividades art??sticas entre otros.', fotominiatura: 'img/sitios/palacio.jpg', fotogrande: 'img/sitios/grandes/palacio.jpg'}, { id: 7, name: 'Centro Cultural Plurifuncional', resumen: 'Este centro est?? ubicado en la colonia Vicente Villada, cuenta con murales en su interior realizado por muralistas chilenos y artistas locales, en este recinto se han llevado a cabo obras de teatro, musicales, conciertos de fama nacional, estos eventos han sido gratuitos, para fomento de la cultura en el municipio. Su auditorio cuenta con tecnolog??a de vanguardia que puede albergar este tipo de eventos.', fotominiatura: 'img/sitios/pluri.jpg', fotogrande: 'img/sitios/grandes/pluri.jpg'}, { id: 8, name: 'Biblioteca Jaime Torres Bodet', resumen: 'Ubicada en Av. Chimalhuac??n, es la biblioteca m??s importante del municipio, se fund?? en 1987, sus instalaciones son accesibles e incitan a la lectura, aqu?? se imparten conferencias, funciones de teatro, exposiciones de artes pl??sticas, entre otras actividades. Cuenta en su interior con una librer??a del Fondo de Cultura Econ??mica que lleva el nombre de Elena Poniatowska. Es el espacio de fomento cultural m??s importante de Nezahualc??yotl.', fotominiatura: 'img/sitios/biblioteca.jpg', fotogrande: 'img/sitios/grandes/biblioteca.jpg'}, { id: 9, name: 'Plaza Ciudad Jard??n', resumen: 'Ubicado en lo que fue uno de los ??ltimos espacios del antiguo y floreciente Lago de Texcoco, sobre Av. Bordo de Xochiaca, se encuentra plaza Ciudad Jard??n, es una plaza moderna que cuenta con tiendas de prestigiadas marcas que la convierten en el punto de encuentro tanto por los habitantes de Neza, como de las personas de municipios cercanos, ya que, podemos encontrar restaurantes, salas de cine, entre muchas cosas m??s, este es un lugar de recreo para las familias.', fotominiatura: 'img/sitios/plaza.jpg', fotogrande: 'img/sitios/grandes/plaza.jpg'} ];

  return {
    cabildos: function() { 
      return cabildos;
    },
    sitios: function() { 
      return sitios;
    },
    getSitio: function(sitioId) {
      for (var i = 0; i < sitios.length; i++) {
        if (sitios[i].id === parseInt(sitioId)) {
          return sitios[i];
        }
      }
      return null;
    }  
  };
})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY NOTICIAS
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('Noticias', function($firebaseArray, miFirebase) {
  //genramos una instancia de directorio en base a miFirebase que ya tiene conecci??n a la base de datos
  var getNoticias = miFirebase.all().child('noticias').orderByChild("orden").limitToFirst(5);
  //regresamos el jason con $firebasearray
  return $firebaseArray(getNoticias).$loaded().then( function(data) {
    return data;
  });
})

//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
//    ---------------------------------------    FACTORY VIALIDAD
//    ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= ======= =======
.factory('Vialidad', function($firebaseArray, miFirebase) {
  //intanciamos el directorio vialidad
  var getVialidad = miFirebase.all().child('vialidad').orderByChild("orden").limitToFirst(7);
  //regresamos el jason con $firebasearray
  return $firebaseArray(getVialidad).$loaded().then( function(data) {
    return data;
  });
});