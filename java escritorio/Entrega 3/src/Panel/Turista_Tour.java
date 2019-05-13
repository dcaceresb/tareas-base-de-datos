/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Panel;

import Conexion.Delete;
import Conexion.Insert;
import Conexion.Select;
import javax.swing.table.DefaultTableModel;

/**
 *
 * @author dabid
 */
public class Turista_Tour extends javax.swing.JPanel
{

    /**
     * Creates new form Tour
     */
    public Turista_Tour()
    {
        initComponents();
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        Select s = new Select();
        s.TablaTuristaTour(model);
        
        String data[] = s.ComboTurista();
        for(String a : data)
        {
            Turista.addItem(a);
        }
        
        data = s.ComboTour();
        for(String a : data)
        {
            Tour.addItem(a);
        }
    
        data = s.ComboDescuento();
        for(String a : data)
        {
            Descuento.addItem(a);
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
        jLabel6 = new javax.swing.JLabel();
        Tour = new javax.swing.JComboBox<>();
        jLabel7 = new javax.swing.JLabel();
        Turista = new javax.swing.JComboBox<>();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        Insertar = new javax.swing.JButton();
        Eliminar = new javax.swing.JButton();
        Refresh = new javax.swing.JButton();
        jLabel8 = new javax.swing.JLabel();
        Descuento = new javax.swing.JComboBox<>();

        setMinimumSize(new java.awt.Dimension(100, 100));
        setPreferredSize(new java.awt.Dimension(400, 279));

        jLabel6.setText("Tour");

        Tour.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "No disponible" }));

        jLabel7.setText("Turista");

        Turista.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "No disponible" }));

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][]
            {

            },
            new String []
            {
                "ID Turista", "ID Tour", "ID descuento"
            }
        )
        {
            boolean[] canEdit = new boolean []
            {
                false, false, false
            };

            public boolean isCellEditable(int rowIndex, int columnIndex)
            {
                return canEdit [columnIndex];
            }
        });
        jTable1.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jTable1MouseClicked(evt);
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

        jLabel8.setText("Descuento");

        Descuento.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "No disponible" }));

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(31, 31, 31)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 653, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(jLabel1)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel7)
                                    .addComponent(Turista, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(27, 27, 27)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel6)
                                    .addComponent(Tour, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addGap(20, 20, 20)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(jLabel8)
                                    .addComponent(Descuento, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                    .addComponent(Eliminar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(Insertar, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, 75, Short.MAX_VALUE)))))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(318, 318, 318)
                        .addComponent(Refresh)))
                .addContainerGap(39, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(17, 17, 17)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(Insertar)
                    .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                        .addGroup(layout.createSequentialGroup()
                            .addComponent(jLabel6)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addComponent(Tour, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGroup(layout.createSequentialGroup()
                            .addComponent(jLabel1)
                            .addGap(26, 26, 26))
                        .addGroup(layout.createSequentialGroup()
                            .addComponent(jLabel7)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addComponent(Turista, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGroup(layout.createSequentialGroup()
                            .addComponent(jLabel8)
                            .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                            .addComponent(Descuento, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addGap(18, 18, 18)
                .addComponent(Eliminar)
                .addGap(28, 28, 28)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 204, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(Refresh)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
    }// </editor-fold>//GEN-END:initComponents

    private void jTable1MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jTable1MouseClicked
    {//GEN-HEADEREND:event_jTable1MouseClicked
        // TODO add your handling code here:
        int i = jTable1.getSelectedRow();
        if(i==-1)
        {
            return;
        }
        Turista.setSelectedItem((String) jTable1.getValueAt(i,0));
        Tour.setSelectedItem((String) jTable1.getValueAt(i,1));
        Descuento.setSelectedItem((String) jTable1.getValueAt(i,2));
  
    }//GEN-LAST:event_jTable1MouseClicked

    private void RefreshActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_RefreshActionPerformed
    {//GEN-HEADEREND:event_RefreshActionPerformed
        DefaultTableModel model = (DefaultTableModel) jTable1.getModel();
        Select s = new Select();
        s.TablaTuristaTour(model);
    }//GEN-LAST:event_RefreshActionPerformed

    private void InsertarActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_InsertarActionPerformed
    {//GEN-HEADEREND:event_InsertarActionPerformed
        String param[] = new String[3];
        param[0] = (String) Tour.getSelectedItem();
        param[1] = (String) Turista.getSelectedItem();
        param[2] = (String) Descuento.getSelectedItem();
        
        param[0] = param[0].split(":")[0];
        param[1] = param[1].split(":")[0];
        param[2] = param[2].split(":")[0];
        
        Insert insert = new Insert();
        insert.InsertIntoTurista_Tour(param);
    }//GEN-LAST:event_InsertarActionPerformed

    private void EliminarActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_EliminarActionPerformed
    {//GEN-HEADEREND:event_EliminarActionPerformed
        String param[] = new String[3];
        param[0] = (String) Tour.getSelectedItem();
        param[1] = (String) Turista.getSelectedItem();
        param[2] = (String) Descuento.getSelectedItem();
        
        param[0] = param[0].split(":")[0];
        param[1] = param[1].split(":")[0];
        param[2] = param[2].split(":")[0];
        
        Delete delete = new Delete();
        delete.DeleteTurista_Tour(param);
    }//GEN-LAST:event_EliminarActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JComboBox<String> Descuento;
    private javax.swing.JButton Eliminar;
    private javax.swing.JButton Insertar;
    private javax.swing.JButton Refresh;
    private javax.swing.JComboBox<String> Tour;
    private javax.swing.JComboBox<String> Turista;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    // End of variables declaration//GEN-END:variables
}
