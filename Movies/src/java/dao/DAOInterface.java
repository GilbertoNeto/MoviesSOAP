/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

/**
 *
 * @author Gilberto Neto
 */
import java.util.List;

public interface DAOInterface<T> {
	public void persistir(T obj);
	public T atualizar(T obj);
	public void apagar(T obj) ;
	public List<T> listar();
	public void reler(T obj);
}
