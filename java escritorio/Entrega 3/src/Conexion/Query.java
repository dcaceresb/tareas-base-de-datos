

package Conexion;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.table.DefaultTableModel;


public class Query
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
     
    public void Query1(DefaultTableModel model)
    {
       
        try
        {
            
            Connection conn = realizaConexion();
        
            model.setRowCount(0);
            model.setColumnCount(0);
            
            String query = "SELECT \n" +
            "  \"Regiones_SinDescuento\".nombre_region\n" +
            "FROM \n" +
            "  public.\"Regiones_SinDescuento\"\n" +
            "WHERE\n" +
            "  \"Regiones_SinDescuento\".count = ( SELECT\n" +
            "				      MAX(\"Regiones_SinDescuento\".count)\n" +
            "				      FROM\n" +
            "				      public.\"Regiones_SinDescuento\")";

            PreparedStatement insert = conn.prepareStatement(query);
            
            int n = 1;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            model.addColumn("nombre_region");
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
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void Query2(DefaultTableModel model)
    {
        try
        {
            Connection conn = realizaConexion();
            model.setRowCount(0);
            model.setColumnCount(0);
            
            String query = "SELECT \n" +
            "  \"Tour\".nombre_tour,\n" +
            "  \"Valores_Tourrs\".totalventas-\"Tourrs_Descuento\".totaldescuento AS Ganancia\n" +
            "FROM \n" +
            "  public.\"Valores_Tourrs\", \n" +
            "  public.\"Tourrs_Descuento\", \n" +
            "  public.\"Tour\"\n" +
            "WHERE \n" +
            "  \"Valores_Tourrs\".id_tour = \"Tourrs_Descuento\".id_tour AND\n" +
            "  \"Tour\".id_tour = \"Valores_Tourrs\".id_tour AND\n" +
            "  \"Valores_Tourrs\".id_tour = \"Tourrs_Descuento\".id_tour";

            PreparedStatement insert = conn.prepareStatement(query);
            
            int n = 1;
            String data[] = new String[n];
            
            ResultSet rs = insert.executeQuery();
            model.addColumn("nombre_tour");
            model.addColumn("Ganancia");
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
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void Query3(DefaultTableModel model)
    {
        try
        {
            Connection conn = realizaConexion();
            model.setRowCount(0);
            model.setColumnCount(0);
            
            String query = "SELECT \n" +
            "  \"Total_Coordinadores\".nombre_tour\n" +
            "FROM \n" +
            "  public.\"Total_Coordinadores\"\n" +
            "WHERE\n" +
            "  \"Total_Coordinadores\".totalcoordinadores = ( SELECT\n" +
            "							MAX(\"Total_Coordinadores\".totalcoordinadores)\n" +
            "							FROM   \n" +
            "								public.\"Total_Coordinadores\")";

            PreparedStatement insert = conn.prepareStatement(query);
            
            int n = 1;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            
            model.addColumn("nombre_tour");
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
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void Query4(DefaultTableModel model)
    {
        try
        {
            Connection conn = realizaConexion();
            model.setRowCount(0);
            model.setColumnCount(0);
            
            String query = "SELECT \n" +
            "  \"Total_Turistas\".id_tour, \n" +
            "  \"Total_Turistas\".nombre_tour\n" +
            "FROM \n" +
            "  public.\"Total_Turistas\"\n" +
            "WHERE\n" +
            "  \"Total_Turistas\".count = (SELECT\n" +
            "									MAX(\"Total_Turistas\".count)\n" +
            "							FROM\n" +
            "									public.\"Total_Turistas\")";

            PreparedStatement insert = conn.prepareStatement(query);
            
            int n = 1;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
            model.addColumn("id_tour");
            model.addColumn("nombre_tour");
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
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public void Query5(DefaultTableModel model)
    {
        try
        {
            Connection conn = realizaConexion();
            model.setRowCount(0);
            model.setColumnCount(0);
            
            String query = "SELECT \n" +
            "  ( \"Total_Arriendo\".totalarriendo/\"Total_vehiculos\".totalvehiculos)*100 AS porcentaje\n" +
            "FROM \n" +
            "  public.\"Total_Arriendo\", \n" +
            "  public.\"Total_vehiculos\"";

            PreparedStatement insert = conn.prepareStatement(query);
            
            int n = 1;
            String data[] = new String[n];
            ResultSet rs = insert.executeQuery();
          
            model.addColumn("porcentaje");
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
            Logger.getLogger(Query.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
