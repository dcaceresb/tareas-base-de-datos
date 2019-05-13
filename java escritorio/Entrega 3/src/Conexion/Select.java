

package Conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.table.DefaultTableModel;

public class Select
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
    
    public void TablaTour(DefaultTableModel model)
    {
        try
        {
            model.setRowCount(0);
            
            Connection conn = realizaConexion();
            String prepare = "select t.id_tour, t.nombre_tour, t.costoi_tour, t.costog_tour, t.personasgrupal_tour, c.nombre_ciudad, lt.id_lugar"
                    + " from \"Ciudad\" c, \"Tour\" t, \"Lugar_Tour\" lt "
                    + " where (t.id_tour = lt.id_tour and c.id_ciudad = t.id_ciudad) ";
               
            PreparedStatement insert = conn.prepareStatement(prepare);
           
            int n = 7;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            while(rs.next())
            {
                
                for(int i = 0;i<n;i++)
                {
                    data[i] = rs.getString(i+1);
                }
                System.out.println(Arrays.toString(data));
                model.addRow(data.clone());            
            }
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void TablaVehiculo(DefaultTableModel model)
    {
        try
        {
            model.setRowCount(0);
            
            Connection conn = realizaConexion();
            String prepare = "select v.id_vehiculo, v.marca_vehiculo, v.capacidad_vehiculo, v.\"año_vehiculo\", x.nombre_tour "
                    + " from \"Vehiculo\" v left join ( select vt.id_vehiculo, t.nombre_tour "
                        + "from \"Tour_Vehiculo\" vt, \"Tour\" t "
                        + "where vt.id_tour = t.id_tour) x "
                    + "on v.id_vehiculo = x.id_vehiculo ";
            PreparedStatement insert = conn.prepareStatement(prepare);
            
            int n = 5;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            while(rs.next())
            {
                for(int i = 0;i<n;i++)
                {
                    data[i] = rs.getString(i+1);
                }
                model.addRow(data.clone());            
            }
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void TablaTurista(DefaultTableModel model)
    {
        try
        {
            model.setRowCount(0);
            
            Connection conn = realizaConexion();
            String prepare = "select t.id_turista, t.nombre_turista, t.telefono_turista, t.nombreemer_turista, t.edad_turista, x.descripcion_enfermedad "
                    + " from \"Turista\" t left join (select et.id_turista, e.descripcion_enfermedad "
                    + " from \"Enfermedad_Turista\" et, \"Enfermedad\" e "
                    + " where et.id_enfermedad = e.id_enfermedad) x "
                    + " on t.id_turista = x.id_turista ";
            PreparedStatement insert = conn.prepareStatement(prepare);
            
            int n = 6;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            while(rs.next())
            {
                for(int i = 0;i<n;i++)
                {
                    data[i] = rs.getString(i+1);
                }
                model.addRow(data.clone());            
            }
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public void TablaGuia(DefaultTableModel model)
    {
        try
        {
            model.setRowCount(0);
            
            Connection conn = realizaConexion();
            String prepare = "select  g.id_guia, g.nombre_guia, g.dirc_guia, c.nombre_ciudad, ge.id_especialidad "
                    + " from \"Guia\" g, \"Guia_Especialidad\" ge, \"Ciudad\" c "
                    + " where g.id_guia = ge.id_guia and g.id_ciudad = c.id_ciudad";
            PreparedStatement insert = conn.prepareStatement(prepare);
            
            int n = 5;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            while(rs.next())
            {
                for(int i = 0;i<n;i++)
                {
                    data[i] = rs.getString(i+1);
                }
                model.addRow(data.clone());            
            }
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void TablaTuristaTour(DefaultTableModel model)
    {
        try
        {
            model.setRowCount(0);
            
            Connection conn = realizaConexion();
            String prepare = "select  *"
                    + "from \"Turista_Tour\"";
            PreparedStatement insert = conn.prepareStatement(prepare);
            
            int n = 3;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            while(rs.next())
            {
                for(int i = 0;i<n;i++)
                {
                    data[i] = rs.getString(i+1);
                }
                model.addRow(data.clone());            
            }
            
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public String[] ComboCiudad()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_ciudad, nombre_ciudad "
                    + "from \"Ciudad\"";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2);
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    
    public String[] ComboLugar()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_lugar, nombre_lugar "
                    + " from \"Lugar\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2);
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    
    public String[] ComboTurista()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_turista, nombre_turista "
                    + " from \"Turista\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2);
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    
    public String[] ComboTour()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_tour, nombre_tour "
                    + " from \"Tour\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2);
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    
    public String[] ComboDescuento()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_descuento, porcentaje_descuento "
                    + " from \"Descuento\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2)+"%";
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    
    public String[] ComboEnfermedad()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_enfermedad, descripcion_enfermedad "
                    + " from \"Enfermedad\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+":"+rs.getString(2);
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
   
    public String[] ComboEspecialidad()
    {
       try
        {
            
            Connection conn = realizaConexion();
            String prepare = "select id_especialidad"
                    + " from \"Especialidad\" ";
            PreparedStatement insert = conn.prepareStatement(prepare);         
            ResultSet rs = insert.executeQuery();

            
            ArrayList<String> tmp = new ArrayList<>();
            String aux;
            while(rs.next())
            {
                aux = rs.getString(1)+": ";
                tmp.add(aux);
            }
            
            String data[] = new String[tmp.size()];
            for (int i =0; i<tmp.size();i++)
            {
                data[i] = tmp.get(i);
            }
            return data;
        } catch (SQLException ex)
        {
            Logger.getLogger(Select.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
}
