/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view;

import controller.FilmeController;
import model.Filme;


/**
 *
 * @author alexs
 */
public class main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
        // TODO code application logic here
        
       FilmeController.inicializar();
       
       FilmeController.cadastrarFilme("Batman", "Tim Burton", "Warner", "Ação", 1989);
       FilmeController.cadastrarFilme("AniquiliaÃ§Ã£o", "XXX", "Netflix", "Ficção", 2018);
       FilmeController.cadastrarFilme("Star Wars - AmeaÃ§a Fantasma", "George Lucas", "Lucas Film", "Ficção", 1999);
    
//         List<Filme> f = FilmeController.filmesByDiretor("Tim Burton");
       
//       Filme f = FilmeController.filmeByTitulo("Batman");
       
//       System.out.println(f.getTitulo());
//         
//         for(Filme fil : f){
//             System.out.println(fil.getDiretor() + fil.getEstudio() + fil.getTitulo());
//         }

//      FilmeController.atualizarFilme("Batman", "The Batman");
      
//        FilmeController.removerFilme("The Batman");

        System.out.println("Concluido!\n");
	FilmeController.finalizar();
        
      
    }
    
}
