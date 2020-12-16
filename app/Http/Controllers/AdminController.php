<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Adopciones;
use App\Clientes;
use App\Estudiantes;
use App\Mascotas;
use App\PostalCode;
use Illuminate\Http\Request;

class AdminController extends Controller
{

     public function __construct()
     {
         $this->middleware('isAdmin');
     }


    public function index()
    {
         return view('admin.index');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function comparation2(Request $request)
    {
      $adopciones = Adopciones::all();
      $clientes = Clientes::all();
      $mascotas = Mascotas::all();
      $cpostales = PostalCode::all();

      $everyClass = ['adopciones' => $adopciones,'clientes' => $clientes,'mascotas' => $mascotas, 'cpostales' => $cpostales];
      $tipo = $request->get('tipo');      
      $flag = 0;
      

    if($tipo == 'compararZonas')
      {
        $A_sur = 0; $A_centro  = 0; $A_norte = 0; $A_valles = 0; 
        $No_sur = 0; $No_centro = 0; $No_norte = 0; $No_valles = 0; 
        $E_sur = 0; $E_centro = 0; $E_norte = 0; $E_valles = 0; 
        $varTop = '';

        foreach ($adopciones as $adopcion)
        {
            if($adopcion->estadoadopcion == 'adoptado'){
                foreach ($clientes as $cliente){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                        foreach ($cpostales as $cpostal){
                            if($cliente->id_postalcode == $cpostal->id_codigopostal){
                                if($cpostal->sector == 'sur'){
                                  $arrayS [] = $cpostal->lugar;
                                  $A_sur++;
                                }
                                if($cpostal->sector == 'centro'){
                                  $arrayC [] = $cpostal->lugar;
                                  $A_centro++;
                                }
                                if($cpostal->sector == 'norte'){
                                  $arrayN [] = $cpostal->lugar;
                                  $A_norte++;
                                }
                                if($cpostal->sector == 'valles'){
                                  $arrayV [] = $cpostal->lugar;
                                  $A_valles++;
                                }
                            }
                        }
                    }
                }
            }
            if($adopcion->estadoadopcion == 'noAdoptado'){
                foreach ($clientes as $cliente){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                        foreach ($cpostales as $cpostal){
                            if($cliente->id_postalcode == $cpostal->id_codigopostal){
                                if($cpostal->sector == 'sur'){
                                  $No_sur++;
                                }
                                if($cpostal->sector == 'centro'){
                                  $No_centro++;
                                }
                                if($cpostal->sector == 'norte'){
                                  $No_norte++;
                                }
                                if($cpostal->sector == 'valles'){
                                  $No_valles++;
                                }
                            }
                        }
                    }
                }
              }
              if($adopcion->estadoadopcion == 'enEspera'){
                foreach ($clientes as $cliente){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                        foreach ($cpostales as $cpostal){
                            if($cliente->id_postalcode == $cpostal->id_codigopostal){
                                if($cpostal->sector == 'sur'){
                                  $E_sur++;
                                }
                                if($cpostal->sector == 'centro'){
                                  $E_centro++;
                                }
                                if($cpostal->sector == 'norte'){
                                  $E_norte++;
                                }
                                if($cpostal->sector == 'valles'){
                                  $E_valles++;
                                }
                            }
                        }
                    }
                }
              }
            $flag = 1;
        }
        
        $arrayCountS= array_count_values($arrayS);
        $arrayFiltradoS = array_unique($arrayS);
        $arrayCombineS = array_combine($arrayFiltradoS, $arrayCountS);
        
        $arrayCountC = array_count_values($arrayC);
        $arrayFiltradoC = array_unique($arrayC);
        $arrayCombineC = array_combine($arrayFiltradoC, $arrayCountC);

        $arrayCountN = array_count_values($arrayN);
        $arrayFiltradoN = array_unique($arrayN);
        $arrayCombineN = array_combine($arrayFiltradoN, $arrayCountN);

        $arrayCountV = array_count_values($arrayV);
        $arrayFiltradoV = array_unique($arrayV);
        $arrayCombineV = array_combine($arrayFiltradoV, $arrayCountV);

        $datos = ['A_sur' => $A_sur, 'A_norte' => $A_norte, 'A_centro' => $A_centro, 'A_valles' => $A_valles, 
        'No_sur' => $No_sur, 'No_norte' => $No_norte, 'No_centro' => $No_centro, 'No_valles' => $No_valles, 
        'E_sur' => $E_sur, 'E_norte' => $E_norte, 'E_centro' => $E_centro, 'E_valles' => $E_valles, 'varTop' => $varTop];

        return view('admin.comparation2', compact('flag'))->with('datos', $datos)->with('arrayCombineS', $arrayCombineS)->with('arrayCombineC', $arrayCombineC)->with('arrayCombineN', $arrayCombineN)->with('arrayCombineV', $arrayCombineV);
      }

      if($tipo == 'compararTipo')
      {
        $A_Perro = 0; $A_Gato = 0; $A_Loro = 0;
        $No_Perro = 0; $No_Gato = 0; $No_Loro = 0; 
        $E_Perro = 0; $E_Gato = 0; $E_Loro = 0; 
        $varTop2 = ' ';

        foreach ($adopciones as $adopcion)
        {
          if($adopcion->estadoadopcion == 'adoptado'){
            foreach ($mascotas as $mascota){
                if($adopcion->id_mascota == $mascota->id_mascota){
                     if($mascota->clasificacion_especie == 'Perro'){
                       $arrayPer [] = $mascota->tipo;
                        $A_Perro++;
                     } 
                     if($mascota->clasificacion_especie == 'Gato'){
                       $arrayGa [] = $mascota->tipo;
                        $A_Gato++;
                      }  
                    if($mascota->clasificacion_especie == 'Loro'){
                       $arrayLo [] = $mascota->tipo;
                        $A_Loro++;
                      }    
                }
            }
          }
          if($adopcion->estadoadopcion == 'noAdoptado'){
            foreach ($mascotas as $mascota){
                if($adopcion->id_mascota == $mascota->id_mascota){
                     if($mascota->clasificacion_especie == 'Perro'){
                        $No_Perro++;
                     } 
                     if($mascota->clasificacion_especie == 'Gato'){
                        $No_Gato++;
                      }  
                    if($mascota->clasificacion_especie == 'Loro'){
                        $No_Loro++;
                      }    
                }
            }
          }
          if($adopcion->estadoadopcion == 'enEspera'){
            foreach ($mascotas as $mascota){
                if($adopcion->id_mascota == $mascota->id_mascota){
                     if($mascota->clasificacion_especie == 'Perro'){
                        $E_Perro++;
                     } 
                     if($mascota->clasificacion_especie == 'Gato'){
                        $E_Gato++;
                      }  
                    if($mascota->clasificacion_especie == 'Loro'){
                        $E_Loro++;
                      }    
                }
            }
          }
        }
          $flag = 2;
          
          $datos2 = ['A_Perro' => $A_Perro, 'A_Gato' => $A_Gato, 'A_Loro' => $A_Loro,
          'No_Perro' => $No_Perro, 'No_Gato' => $No_Gato, 'No_Loro' => $No_Loro,  
          'E_Perro' => $E_Perro, 'E_Gato' => $E_Gato, 'E_Loro' => $E_Loro, 'varTop2' => $varTop2];


          $arrayCountPer= array_count_values($arrayPer);
          $arrayFiltradoPer = array_unique($arrayPer);
          $arrayCombinePer = array_combine($arrayFiltradoPer, $arrayCountPer);

          $arrayCountGa= array_count_values($arrayGa);
          $arrayFiltradoGa = array_unique($arrayGa);
          $arrayCombineGa = array_combine($arrayFiltradoGa, $arrayCountGa);

          $arrayCountLo= array_count_values($arrayLo);
          $arrayFiltradoLo = array_unique($arrayLo);
          $arrayCombineLo = array_combine($arrayFiltradoLo, $arrayCountLo);

        return view('admin.comparation2', compact('flag'))->with('datos2', $datos2)->with('arrayCombinePer', $arrayCombinePer)->with('arrayCombineGa', $arrayCombineGa)->with('arrayCombineLo', $arrayCombineLo);
      }
    
    if($tipo == 'compararZonasTipo'){

      $Adop_Pe_Sur = 0 ;$Adop_Pe_Norte = 0 ;$Adop_Pe_Centr = 0 ;$Adop_Pe_Vall = 0 ;
      $Adop_Ga_Sur = 0 ;$Adop_Ga_Norte = 0 ;$Adop_Ga_Centr = 0 ;$Adop_Ga_Vall = 0 ;
      $Adop_Lo_Sur = 0 ;$Adop_Lo_Norte = 0 ;$Adop_Lo_Centr = 0 ;$Adop_Lo_Vall = 0 ;

      foreach ($adopciones as $adopcion)
      {
          if($adopcion->estadoadopcion == 'adoptado'){
              foreach ($clientes as $cliente){
                  foreach($mascotas as $mascota){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                      if($adopcion->id_mascota == $mascota->id_mascota){
                        foreach ($cpostales as $cpostal){
                          if($cliente->id_postalcode == $cpostal->id_codigopostal){
                                if($cpostal->sector == 'norte' && $mascota->clasificacion_especie == 'Perro'){
                                  $Adop_Pe_Norte++;
                                }
                                if($cpostal->sector == 'centro' && $mascota->clasificacion_especie == 'Perro'){
                                  $Adop_Pe_Centr++;
                                }
                                if($cpostal->sector == 'sur' && $mascota->clasificacion_especie == 'Perro'){
                                  $Adop_Pe_Sur++;
                                }
                                if($cpostal->sector == 'valles' && $mascota->clasificacion_especie == 'Perro'){
                                  $Adop_Pe_Vall++;
                                }
                                if($cpostal->sector == 'norte' && $mascota->clasificacion_especie == 'Gato'){
                                  $Adop_Ga_Norte++;
                                }
                                if($cpostal->sector == 'centro' && $mascota->clasificacion_especie == 'Gato'){
                                  $Adop_Ga_Centr++;
                                }
                                if($cpostal->sector == 'sur' && $mascota->clasificacion_especie == 'Gato'){
                                  $Adop_Ga_Sur++;
                                }
                                if($cpostal->sector == 'valles' && $mascota->clasificacion_especie == 'Gato'){
                                  $Adop_Ga_Vall++;
                                }
                                if($cpostal->sector == 'norte' && $mascota->clasificacion_especie == 'Loro'){
                                  $Adop_Lo_Norte++;
                                }
                                if($cpostal->sector == 'centro' && $mascota->clasificacion_especie == 'Loro'){
                                  $Adop_Lo_Centr++;
                                }
                                if($cpostal->sector == 'sur' && $mascota->clasificacion_especie == 'Loro'){
                                  $Adop_Lo_Sur++;
                                }
                                if($cpostal->sector == 'valles' && $mascota->clasificacion_especie == 'Loro'){
                                  $Adop_Lo_Vall++;
                                }
                              }
                            }
                          }
                        }
                      }
                  }
              }
        }
        $flag = 3;

        $datos3 = ['Adop_Pe_Norte' => $Adop_Pe_Norte, 'Adop_Pe_Sur' => $Adop_Pe_Sur, 'Adop_Pe_Centr' => $Adop_Pe_Centr, 'Adop_Pe_Vall' => $Adop_Pe_Vall,
        'Adop_Ga_Norte' => $Adop_Ga_Norte, 'Adop_Ga_Sur' => $Adop_Ga_Sur, 'Adop_Ga_Centr' => $Adop_Ga_Centr, 'Adop_Ga_Vall' => $Adop_Ga_Vall,
        'Adop_Lo_Norte' => $Adop_Lo_Norte, 'Adop_Lo_Sur' => $Adop_Lo_Sur, 'Adop_Lo_Centr' => $Adop_Lo_Centr, 'Adop_Lo_Vall' => $Adop_Lo_Vall];

        return view('admin.comparation2', compact('flag'))->with('datos3', $datos3 );
      }

      return view('admin.comparation2', compact('flag'))->with('everyClass', $everyClass); 
    }

    public function comparation(Request $request){
        $adopciones = Adopciones::all();
        $clientes = Clientes::all();
        $mascotas = Mascotas::all();
        $cpostales = PostalCode::all();
        $array2 [] = '';
        $array3 [] = '';

        $filtro1 = $request->get('tipo'); 
        $filtro2 = $request->get('tipo2');

        foreach ($adopciones as $adopcion){
          if($adopcion->estadoadopcion == 'adoptado'){
            foreach($clientes as $cliente){
              if($adopcion->id_cliente == $cliente->id_cliente){
                foreach($cpostales as $cpostal){
                  if($cliente->id_postalcode == $cpostal->id_codigopostal){
                       $array1 [] = $cpostal->lugar;
                  }
                }
              }
            }
          }      
        }

        // foreach ($adopciones as $adopcion){
        //   if($adopcion->estadoadopcion == 'adoptado'){
        //     foreach($clientes as $cliente){
        //       if($adopcion->id_cliente == $cliente->id_cliente){
        //         foreach($cpostales as $cpostal){
        //           if($cliente->id_postalcode == $cpostal->id_codigopostal){
        //               if($cpostal->lugar == $filtro1){
        //                   $array2 [] = $cpostal->sector;
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }      
        // }

        foreach ($adopciones as $adopcion)
          {
          if($adopcion->estadoadopcion == 'adoptado'){
              foreach ($clientes as $cliente){
                  foreach($mascotas as $mascota){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                      if($adopcion->id_mascota == $mascota->id_mascota){
                        foreach ($cpostales as $cpostal){
                          if($cliente->id_postalcode == $cpostal->id_codigopostal){
                              if($cpostal->lugar == $filtro1){
                                $array2 [] = $cpostal->lugar;
                                $array2 [] = $cliente->nombres;
                                $array2 [] = $mascota->clasificacion_especie;
                                $array2 [] = $cpostal->sector;
                              }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }

        foreach ($adopciones as $adopcion)
          {
          if($adopcion->estadoadopcion == 'adoptado'){
              foreach ($clientes as $cliente){
                  foreach($mascotas as $mascota){
                    if($adopcion->id_cliente == $cliente->id_cliente){
                      if($adopcion->id_mascota == $mascota->id_mascota){
                        foreach ($cpostales as $cpostal){
                          if($cliente->id_postalcode == $cpostal->id_codigopostal){
                              if($cpostal->lugar == $filtro2){
                                $array3 [] = $cpostal->lugar;
                                $array3 [] = $cliente->nombres;
                                $array3 [] = $mascota->clasificacion_especie;
                                $array3 [] = $cpostal->sector;
                              }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }

      // $comparacion =  Mascotas::where('id_mascota', '=', $id)->update($datosMasc);

      $arrayFiltr= array_unique($array1);

        return view('admin.comparation')->with('clientes', $clientes)->with('mascotas', $mascotas)->with('adopciones', $adopciones)->with('arrayFiltr', $arrayFiltr)->with('array2', $array2)->with('array3', $array3);
    }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     //
    // }
    // public function show(Admin $admin)
    // {
    //     //
    // }
    // public function edit(Admin $admin)
    // {
    //     //
    // }

}
