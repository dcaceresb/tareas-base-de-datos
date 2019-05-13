package Panel;

import Conexion.*;
import java.util.Arrays;
import javax.swing.JComboBox;
import javax.swing.table.DefaultTableModel;

public class Tour extends javax.swing.JPanel
{

    /**
     * Creates new form Tour
     */
    public Tour()
    {
        initComponents();
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        Select s = new Select();
        s.TablaTour(model);
        
        String data[] = s.ComboCiudad();
        for(String a : data)
        {
            Ciudad.addItem(a);
        }
        
        data = s.ComboLugar();
        for(String a : data)
        {
            Lugar.addItem(a);
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents()
    {

        jLabel1 = new javax.swing.JLabel();
        ID = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        Nombre = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        Individual = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        Grupal = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        Minimo = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        Ciudad = new javax.swing.JComboBox<>();
        jLabel7 = new javax.swing.JLabel();
        Lugar = new javax.swing.JComboBox<>();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        Insertar = new javax.swing.JButton();
        Modificar = new javax.swing.JButton();
        Eliminar = new javax.swing.JButton();
        Refresh = new javax.swing.JButton();

        setMinimumSize(new java.awt.Dimension(100, 100));
        setPreferredSize(new java.awt.Dimension(400, 279));

        jLabel1.setText("ID Tour");

        jLabel2.setText("Nombre Tour");

        jLabel3.setText("Costo Individual");

        jLabel4.setText("Costo Grupal");

        jLabel5.setText("Minimo Grupo");

        jLabel6.setText("Ciudad");

        Ciudad.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "No disponible" }));

        jLabel7.setText("Lugar");

        Lugar.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "No disponible" }));

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][]
            {

            },
            new String []
            {
                "ID", "Nombre", "Costo individual", "Costo grupal", "Minimo grupo", "Ciudad", "Lugar"
            }
        )
        {
            boolean[] canEdit = new boolean []
            {
                false, true, true, true, true, true, true
            };

            public boolean isCellEditable(int rowIndex, int columnIndex)
            {
                return canEdit [columnIndex];
            }
        });
        jTable1.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseReleased(java.awt.event.MouseEvent evt)
            {
                jTable1MouseReleased(evt);
            }
        });
        jScrollPane1.setViewportView(jTable1);

        Insertar.setText("Insertar");
        Insertar.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                InsertarActionPerformed(evt);
            }
        });

        Modificar.setText("Modificar");
        Modificar.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                ModificarActionPerformed(evt);
            }
        });

        Eliminar.setText("Eliminar");
        Eliminar.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                EliminarActionPerformed(evt);
            }
        });

        Refresh.setText("Recargar Tabla");
        Refresh.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                RefreshActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(31, 31, 31)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 653, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jLabel1)
                            .addComponent(jLabel2)
                            .addComponent(ID)
                            .addComponent(Nombre, javax.swing.GroupLayout.DEFAULT_SIZE, 79, Short.MAX_VALUE))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jLabel4)
                            .addComponent(Individual)
                            .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(Grupal))
                        .addGap(18, 18, 18)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(jLabel5, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                        .addGap(38, 38, 38))
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(Minimo)
                                        .addGap(20, 20, 20)))
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel6)
                                    .addComponent(Ciudad, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addComponent(jLabel7)
                            .addComponent(Lugar, javax.swing.GroupLayout.PREFERRED_SIZE, 118, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 259, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(Modificar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(Eliminar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(Insertar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
                .addContainerGap(93, Short.MAX_VALUE))
            .addGroup(layout.createSequentialGroup()
                .addGap(318, 318, 318)
                .addComponent(Refresh)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(17, 17, 17)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                        .addGroup(layout.createSequentialGroup()
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(jLabel5)
                                .addComponent(jLabel3)
                                .addComponent(jLabel6))
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(Minimo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(Ciudad, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                        .addGroup(layout.createSequentialGroup()
                            .addComponent(jLabel1)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                                .addComponent(ID, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addComponent(Individual, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(Insertar)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(Modificar)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel4)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(Grupal, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel2)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(Nombre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jLabel7)
                    .addComponent(Eliminar)
                    .addComponent(Lugar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 204, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(Refresh)
                .addContainerGap(48, Short.MAX_VALUE))
        );
    }// </editor-fold>//GEN-END:initComponents

    private void jTable1MouseReleased(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jTable1MouseReleased
    {//GEN-HEADEREND:event_jTable1MouseReleased
        int i = jTable1.getSelectedRow();
        if(i==-1)
        {
            return;
        }
        System.out.println(i);
        int n = 7;
        ID.setText((String) jTable1.getValueAt(i,0));
        Nombre.setText((String) jTable1.getValueAt(i,1));
        Individual.setText((String) jTable1.getValueAt(i,2));
        Grupal.setText((String) jTable1.getValueAt(i,3));
        Minimo.setText((String) jTable1.getValueAt(i,4));
        Ciudad.setSelectedItem((String) jTable1.getValueAt(i,5));
        Lugar.setSelectedItem((String) jTable1.getValueAt(i,6));
    }//GEN-LAST:event_jTable1MouseReleased

    private void InsertarActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_InsertarActionPerformed
    {//GEN-HEADEREND:event_InsertarActionPerformed
        String param[] = new String[7];
        param[0] = ID.getText();
        param[1] = Nombre.getText();
        param[2] = Individual.getText();
        param[3] = Grupal.getText();
        param[4] = Minimo.getText();
        param[5] = (String) Ciudad.getSelectedItem();
        param[6] = (String) Lugar.getSelectedItem();
        
        param[5] = param[5].split(":")[0];
        param[6] = param[6].split(":")[0];
        Insert insert = new Insert();
        insert.InsertIntoTour(param);
        
        String aux[] = new String[2];
        aux[0] = param[6];
        aux[1] = param[0];
        insert.InsertIntoLugar_Tour(aux);
    }//GEN-LAST:event_InsertarActionPerformed

    private void RefreshActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_RefreshActionPerformed
    {//GEN-HEADEREND:event_RefreshActionPerformed
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        Select s = new Select();
        s.TablaTour(model);
    }//GEN-LAST:event_RefreshActionPerformed

    private void EliminarActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_EliminarActionPerformed
    {//GEN-HEADEREND:event_EliminarActionPerformed
        String param[] = new String[1];
        param[0] = ID.getText();
        Delete delete = new Delete();
        delete.DeleteTour(param);
    }//GEN-LAST:event_EliminarActionPerformed

    private void ModificarActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_ModificarActionPerformed
    {//GEN-HEADEREND:event_ModificarActionPerformed
        String param[] = new String[7];
        param[0] = ID.getText();
        param[1] = Nombre.getText();
        param[2] = Individual.getText();
        param[3] = Grupal.getText();
        param[4] = Minimo.getText();
        param[5] = (String) Ciudad.getSelectedItem();
        param[6] = (String) Lugar.getSelectedItem();
        
        param[5] = param[5].split(":")[0];
        param[6] = param[6].split(":")[0];
        Update insert = new Update();
        insert.UpdateIntoTour(param);
    }//GEN-LAST:event_ModificarActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JComboBox<String> Ciudad;
    private javax.swing.JButton Eliminar;
    private javax.swing.JTextField Grupal;
    private javax.swing.JTextField ID;
    private javax.swing.JTextField Individual;
    private javax.swing.JButton Insertar;
    private javax.swing.JComboBox<String> Lugar;
    private javax.swing.JTextField Minimo;
    private javax.swing.JButton Modificar;
    private javax.swing.JTextField Nombre;
    private javax.swing.JButton Refresh;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    // End of variables declaration//GEN-END:variables
}
