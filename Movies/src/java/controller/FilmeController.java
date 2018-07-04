/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package controller;

import dao.DAO;
import dao.FilmeDAO;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import model.Filme;

/**
 *
 * @author Gilberto Neto
 */
public class FilmeController {

    private static FilmeDAO filmeDAO = new FilmeDAO();

    public static void inicializar(){
	DAO.abrir();
    }

    public static void finalizar(){
	DAO.fechar();
    }

    public static Filme cadastrarFilme(String titulo, String diretor, String estudio,
    String genero, int anoLancamento) throws Exception{

      FilmeController.inicializar();

        DAO.iniciar();

        Filme f = filmeDAO.findByTitulo(titulo);

        if (Objects.nonNull(f))
            throw new Exception("Filme já cadastrado: " + titulo);

        f = new Filme(titulo, diretor, estudio, genero, anoLancamento);

        filmeDAO.persistir(f);

        filmeDAO.efetivar();

        System.out.println("filme cadastrado com sucesso");

        return f;

    }

    public static Filme atualizarFilme(String titulo, String novoTitulo) throws Exception{

    	FilmeController.inicializar();	

        DAO.iniciar();

        Filme f = filmeDAO.findByTitulo(titulo);

        if (Objects.nonNull(f)){
            f.setTitulo(novoTitulo);
            filmeDAO.atualizar(f);
            filmeDAO.efetivar();

        } else
            throw new Exception("Filme não localizado na base de dados");

        System.out.println("filme atualizado com sucesso, com o nome " + f.getTitulo());

        return f;

    }

    public static List<Filme> filmesByDiretor(String diretor) throws Exception{
    	
    	FilmeController.inicializar();	
    	
        List<Filme> filmes = filmeDAO.findByDiretor(diretor);

        if (Objects.isNull(filmes))
           throw new Exception("Filmes não localizados");

        return filmes;
    }

    public static List<Filme> filmesByGenero(String genero) throws Exception{

    	FilmeController.inicializar();	
    	
        List<Filme> filmes = filmeDAO.findByGenero(genero);

        if (Objects.isNull(filmes))
           throw new Exception("Filmes não localizados");

        return filmes;
    }

    public static List<Filme> filmesByAno(int anoLancamento) throws Exception{

    	FilmeController.inicializar();	

        List<Filme> filmes = filmeDAO.findByAno(anoLancamento);

        if (Objects.isNull(filmes))
           throw new Exception("Filmes não localizados");

        return filmes;
    }

    public static Filme removerFilme(String titulo) throws Exception {

    	FilmeController.inicializar();	

       DAO.iniciar();

       Filme f = filmeDAO.findByTitulo(titulo);

        System.out.println(f.getTitulo());
       
       if (Objects.isNull(f))
           throw new Exception("Filme não localizado");

       Filme fAux = f;

       System.out.println(fAux.getTitulo() + "1");
       
       filmeDAO.apagar(f);
       DAO.efetivar();

       System.out.println(fAux.getTitulo() + "1");
       
       return fAux;
    }

    public static List<Filme> filmeByTitulo(String titulo) throws Exception{

    	FilmeController.inicializar();	
    	
//        Filme filme = filmeDAO.findByTitulo(titulo);
        
        List<Filme> listaFilmes = filmeDAO.listar();
        List<Filme> filmesByTitle = new ArrayList<Filme>();
//        if (Objects.isNull(filme))
//           throw new Exception("Filme não localizado");
        
        for (Filme filme : listaFilmes) {
            if (filme.getTitulo().toLowerCase().contains(titulo.toLowerCase())){
                filmesByTitle.add(filme);
            }
        }
        
        if (Objects.isNull(filmesByTitle)){
            throw new Exception("Não foram encontrados filmes com o titulo informado.");
        }
        
        return filmesByTitle;
    }

}
