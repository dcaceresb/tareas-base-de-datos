

package Conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Update
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
    
    public void UpdateIntoTour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            String prepare = "update \"Tour\" set nombre_tour = ?, costoi_tour = ?, costog_tour = ?, personasgrupal_tour = ?, id_ciudad = ? where id_tour = ? ";
            PreparedStatement insert = conn.prepareStatement(prepare);
            //idtour, nombre, costoi, costog, grupo,idciudad
            
            insert.setString(1,params[1]);
            insert.setInt(2, Integer.parseInt(params[2]));     
            insert.setInt(3, Integer.parseInt(params[3]));
            insert.setInt(4, Integer.parseInt(params[4]));
            insert.setInt(5, Integer.parseInt(params[5]));
            insert.setInt(6, Integer.parseInt(params[0]));
            
            
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Update.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void UpdateIntoVehiculo(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, marca, capacidad, año
            String prepare = "update \"Vehiculo\" set marca_vehiculo = ?, capacidad_vehiculo = ?, \"año_vehiculo\" = ? where id_vehiculo = ?";
            PreparedStatement insert = conn.prepareStatement(prepare);

            
            insert.setString(1,params[1]);     
            insert.setInt(2, Integer.parseInt(params[2]));
            insert.setInt(3, Integer.parseInt(params[3]));
            insert.setInt(4, Integer.parseInt(params[0]));
            
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Update.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void UpdateIntoTurista(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, nombre, tel int, emerg, edad
            String prepare = "Update \"Turista\" set nombre_turista = ?, telefono_turista = ?,nombreemer_turista = ?, edad_turista = ? where id_turista = ? ";
            PreparedStatement insert = conn.prepareStatement(prepare);
            
            
            insert.setString(1,params[1]);
            insert.setInt(2, Integer.parseInt(params[2]));
            insert.setString(3,params[3]);
            insert.setInt(4, Integer.parseInt(params[4]));
            insert.setInt(5, Integer.parseInt(params[0]));
            
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Update.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void UpdateIntoGuia(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, dirceccion, nombre, ciudad
            String prepare = "Update \"Guia\" set dirc_guia = ?, nombre_guia = ?,id_ciudad = ? where id_guia = ? ";        
            PreparedStatement insert = conn.prepareStatement(prepare);
                      
            insert.setString(1,params[1]);
            insert.setString(2,params[2]);
            insert.setInt(3, Integer.parseInt(params[3]));
            insert.setInt(4, Integer.parseInt(params[0]));
            
            insert.executeUpdate();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Update.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
     
}
