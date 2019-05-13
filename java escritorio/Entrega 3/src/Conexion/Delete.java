

package Conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Delete
{
    public Connection realizaConexion()
    {
        Connection conn = null;
        String urlDatabase =  "jdbc:postgresql://localhost:5432/marin"; 
        try 
        {
            Class.forName("org.postgresql.Driver");
            conn = DriverManager.getConnection(urlDatabase,  "postgres","");
        } catch (Exception e) 
        {
            System.out.println("Ocurrio un error : "+e.getMessage());
        }
        System.out.println("La conexión se realizo sin problemas! =) ");
        return conn;
    }
    
    public void DeleteTour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            
            String prepare = "delete from \"Lugar_Tour\" where id_tour = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from  \"Turista_Tour\" where id_tour = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from  \"Guia_Tour\" where id_tour = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from  \"Tour_Vehiculo\" where id_tour = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from  \"Tour\" where id_tour = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Delete.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void DeleteVehiculo(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, marca, capacidad, año
            String prepare = "delete from \"Tour_Vehiculo\" where id_vehiculo = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from \"Vehiculo_Empresa_Tour\" where id_vehiculo = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from \"Vehiculo\" where id_vehiculo = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Delete.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void DeleteTurista(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, nombre, tel int, emerg, edad
            String prepare = "delete from \"Enfermedad_Turista\" where id_turista = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();

            prepare = "delete from \"Turista_Tour\" where id_turista = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from \"Turista\" where id_turista = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Delete.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void DeleteGuia(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, dirceccion, nombre, ciudad
            String prepare = "delete from \"Guia_Especialidad\" where id_guia = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from \"Guia_Tour\" where id_guia = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();
            
            prepare = "delete from \"Guia\" where id_guia = ?";
            insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.executeUpdate();

            
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Delete.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void DeleteTurista_Tour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, dirceccion, nombre, ciudad
            String prepare = "delete from \"Turista_Tour\" where id_tour = ? and id_turista = ? and id_descuento = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));    
            insert.setInt(2, Integer.parseInt(params[1]));  
            insert.setInt(3, Integer.parseInt(params[2]));  
            insert.executeUpdate();
           

            
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Delete.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
