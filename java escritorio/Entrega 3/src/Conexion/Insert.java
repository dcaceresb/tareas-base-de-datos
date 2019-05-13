

package Conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

public class Insert
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
    
    public void InsertIntoTour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            String prepare = "Insert into \"Tour\" values(?,?,?,?,?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            //idtour, nombre, costoi, costog, grupo,idciudad
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setString(2,params[1]);
            insert.setInt(3, Integer.parseInt(params[2]));
            insert.setInt(4, Integer.parseInt(params[3]));
            insert.setInt(5, Integer.parseInt(params[4]));
            insert.setInt(6, Integer.parseInt(params[5]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void InsertIntoVehiculo(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, marca, capacidad, año
            String prepare = "Insert into \"Vehiculo\" values(?,?,?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            //nombre, costoi, costog, grupo, idtour, idciudad
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setString(2,params[1]);     
            insert.setInt(3, Integer.parseInt(params[2]));
            insert.setInt(4, Integer.parseInt(params[3]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void InsertIntoTurista(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, nombre, tel int, emerg, edad
            String prepare = "Insert into \"Turista\" values(?,?,?,?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setString(2,params[1]);
            insert.setInt(3, Integer.parseInt(params[2]));
            insert.setString(4,params[3]);
            insert.setInt(5, Integer.parseInt(params[4]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void InsertIntoGuia(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id, dirceccion, nombre, ciudad
            String prepare = "Insert into \"Guia\" values(?,?,?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setString(2,params[1]);
            insert.setString(3,params[2]);
            insert.setInt(4, Integer.parseInt(params[3]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void InsertIntoEnfermedad_Turista(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id_enfermedad, turista
            String prepare = "Insert into \"Enfermedad_Turista\" values(?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setInt(2, Integer.parseInt(params[1]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     
    public void InsertIntoTurista_Tour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id_enfermedad, turista
            String prepare = "Insert into \"Turista_Tour\" values(?,?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setInt(2, Integer.parseInt(params[1]));
            insert.setInt(3, Integer.parseInt(params[2]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
     
    public void InsertIntoTour_Vehiculo(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id_enfermedad, turista
            String prepare = "Insert into \"Tour_Vehiculo\"(id_vehiculo,id_tour) values(?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setInt(2, Integer.parseInt(params[1]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void InsertIntoLugar_Tour(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id_enfermedad, turista
            String prepare = "Insert into \"Lugar_Tour\"(id_lugar,id_tour) values(?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setInt(2, Integer.parseInt(params[1]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void InsertGuia_Especialidad(String params[])
    {
        try
        {
            Connection conn = realizaConexion();
            //id_enfermedad, turista
            String prepare = "Insert into \"Guia_Especialidad\" values(?,?)";
            PreparedStatement insert = conn.prepareStatement(prepare);
            insert.setInt(1, Integer.parseInt(params[0]));
            insert.setInt(2, Integer.parseInt(params[1]));
            
            insert.execute();
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Insert.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
