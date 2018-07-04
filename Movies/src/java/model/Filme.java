/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

/**
 *
 * @author alexs
 */
@Entity
public class Filme implements Serializable {

    private static final long serialVersionUID = -6580012241620579129L;
//   tÃ­tulo, diretor, estÃºdio, gÃªnero e ano de lanÃ§amento,
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private long id;
    
    @Column(name="TITULO")
    private String titulo;

    @Column(name="DIRETOR")
    private String diretor;

    @Column(name="ESTUDIO")
    private String estudio;

    @Column(name="GENERO")
    private String genero;

    @Column(name="ANOLANCAMENTO")
    private int anoLancamento;

    public Filme() {
    }

    public Filme(String titulo, String diretor, String estudio, String genero, int anoLancamento){
        
        setTitulo(titulo);
        setDiretor(diretor);
        setEstudio(estudio);
        setGenero(genero);
        setAnoLancamento(anoLancamento);
    }
    
    //getters e setters dos atributos
    public long getId() {
        return this.id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getTitulo() {
        return this.titulo;
    }

    public void setTitulo(String titulo) {
        this.titulo = titulo;
    }

    public String getDiretor() {
        return diretor;
    }

    public void setDiretor(String diretor) {
        this.diretor = diretor;
    }

    public String getEstudio() {
        return estudio;
    }

    public void setEstudio(String estudio) {
        this.estudio = estudio;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public int getAnoLancamento() {
        return anoLancamento;
    }

    public void setAnoLancamento(int anoLancamento) {
        this.anoLancamento = anoLancamento;
    }
    
}
