/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package service;

import controller.FilmeController;
import java.util.ArrayList;
import java.util.List;
import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebResult;
import model.Filme;

/**
 *
 * @author alexs
 */
@WebService(serviceName = "WebMovies")
public class WebMovies {
    
    List<Filme> filmes = new ArrayList<>();  
    
    @WebMethod(operationName = "newMovie")
    public Filme newMovie(
                           @WebParam(name = "titulo") String tit,
                           @WebParam(name = "diretor") String dir,
                           @WebParam(name = "estudio") String est,
                           @WebParam(name = "genero") String gen,
                           @WebParam(name = "lancamento") String dataLanc) throws Exception {
    
        int data = Integer.parseInt(dataLanc);
        
    	Filme filme = new Filme();
        filme.setTitulo(tit);
        filme.setDiretor(dir);
        filme.setGenero(gen);
        filme.setEstudio(est);
        filme.setAnoLancamento(data);
                
        FilmeController.cadastrarFilme(tit, dir, est, gen, data);
        
        return filme;
    }
    
    @WebMethod(operationName = "getMovieTitle")
    public List<Filme> getMovieTitle(@WebParam(name = "titulo") String tit) throws Exception {
        
        List<Filme> filmes = FilmeController.filmeByTitulo(tit);
        
        return filmes;
    }
    
    @WebMethod(operationName = "getMovieDiretor")
    public List<Filme> getMovieDirector(@WebParam(name = "diretor") String dir) throws Exception {
    	
    	List<Filme> f = FilmeController.filmesByDiretor(dir);
    	
    	return f;
    }
    
    @WebMethod(operationName = "getMovieStudio")
    public List<Filme> getMovieStudio(@WebParam(name = "estudio") String est) throws Exception {
    	
    	List<Filme> f = FilmeController.filmesByDiretor(est);
    	
    	return f;
    }
    
    @WebMethod(operationName = "getMovieGenre")
    public List<Filme> getMovieGenre(@WebParam(name = "genero") String gen) throws Exception {
    	
    	List<Filme> f = FilmeController.filmesByGenero(gen);
    	
    	return f;    	    	
    }
    
    @WebMethod(operationName = "getMovieAge")
    public List<Filme> getMovieAge(@WebParam(name = "age") int age) throws Exception {
    	List<Filme> f = FilmeController.filmesByAno(age);
    	
    	return f;
    }
    
    @WebMethod(operationName = "removeMovie")
    public Filme removeMovie(@WebParam(name="titulo") String title) throws Exception{
        
        Filme filmeRemoved = FilmeController.removerFilme(title);
        
        return filmeRemoved;
    }
    
    @WebMethod(operationName="updateMovie")
    public Filme atualizarMovie(@WebParam(name="titulo") String title, 
            @WebParam(name="novoTitulo") String newTitle) throws Exception{
        
        Filme filmeUpdated = FilmeController.atualizarFilme(title, newTitle);
        
        return filmeUpdated;
        
    }
    
    @WebMethod(operationName = "listAll")
    public List<Filme> listAllMovie(@WebParam(name="value") String value) throws Exception{
        
        List<Filme> allMovies = FilmeController.AllMovies("Sim");
        
        return allMovies;
        
    }
       
}
