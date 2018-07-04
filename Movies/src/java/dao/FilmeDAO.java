/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.util.List;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.NoResultException;
import javax.persistence.Persistence;
import javax.persistence.Query;
import model.Filme;

/**
 *
 * @author alexs
 */
public class FilmeDAO extends DAO<Filme> {
  
  public Filme findById (int n){
      
            try{
                Query q = manager.createQuery("select a from Filme f where f.id= '" + n +"'");
                return (Filme) q.getSingleResult();	
            }catch(NoResultException e){			
                return null;
            }
	} 

  public Filme findByTitulo(String titulo){
	try {			
            Query q = manager.createQuery("Select f from Filme f where f.titulo = '" + titulo + "'");
			
            return (Filme) q.getSingleResult();
			
         } catch (NoResultException e) {
            return null;
            }
	}
  
  public List<Filme> findByDiretor(String diretor){
      
      try {
          Query q = manager.createQuery("Select f from Filme f where f.diretor = '" + diretor + "'");
          return q.getResultList();
          
      } catch (NoResultException e) {
          return null;
      }      
  }
  
  public List<Filme> findByGenero(String genero){
      
      try {
          Query q = manager.createQuery("Select f from Filme f where f.genero = '" + genero+ "'");
          return q.getResultList();
          
      } catch (NoResultException e) {
          return null;
      }      
  }
  
  
  public List<Filme> findByAno(int anoLancamento){
      
      try {
          Query q = manager.createQuery("Select f from Filme f where f.anoLancamento = '" + anoLancamento+ "'");
          return q.getResultList();
          
      } catch (NoResultException e) {
          return null;
      }      
  }
  
}
