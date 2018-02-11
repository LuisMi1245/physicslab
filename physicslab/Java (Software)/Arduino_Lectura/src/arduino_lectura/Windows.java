
package arduino_lectura;

import Arduino.Arduino;
import gnu.io.SerialPortEvent;
import gnu.io.SerialPortEventListener;
import java.io.FileOutputStream;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFileChooser;
import javax.swing.table.DefaultTableModel;
import org.apache.poi.hssf.usermodel.HSSFCell;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;

/**
 *
 * @author CreatorslAB
 */

public class Windows extends javax.swing.JFrame {
    
    DefaultTableModel Modelo;
    
   public void TableUpdate(){
       
       Modelo.addRow(new Object[]{"",time_1 , time_2, ""});
       //System.out.println("Tiempo 1:" +time_1+ " Tiempo 2:" + time_2);       
   }
    public Windows() {
        initComponents();
        Modelo = (DefaultTableModel) jTable1.getModel();
       
        try {
            Arduino.ArduinoRXTX("COM3", 2000, 9600, evento);
        } catch (Exception ex) {
            Logger.getLogger(Windows.class.getName()).log(Level.SEVERE, null, ex);
        }
       
        }

    
    Arduino Arduino = new Arduino();
   
    int Slot=1;
    float time_1;
    float time_2;
    float vel_1;
    float vel_2;
    int Lecturas=0;
    
    
    public void FicheroExcel(String input){
        HSSFWorkbook libro = new HSSFWorkbook();
        HSSFSheet hoja = libro.createSheet();
        HSSFRow fila = hoja.createRow(0);
        HSSFCell celda = fila.createCell(0);
        celda.setCellValue("Datos obtenidos del sensor");
        
        // Colocamos los encabezados
        
        fila = hoja.createRow(1);
        celda = fila.createCell(0);
        celda.setCellValue("Hora");
        celda = fila.createCell(1);
        celda.setCellValue("Tiempo 1");
        celda = fila.createCell(2);
        celda.setCellValue("Tiempo 2");
        
        for (int i = 0; i <= Modelo.getRowCount() - 1; i++){
            fila = hoja.createRow(i + 2);
            for(int j = 0; j <= 2; j++){
                celda = fila.createCell(j);
                celda.setCellValue(jTable1.getValueAt(i, j).toString());
            
            }
        }
try{
    FileOutputStream Fichero = new FileOutputStream(input);
    libro.write(Fichero);
    Fichero.close();
} catch(Exception e){
    e.printStackTrace();
    }
}
    
    SerialPortEventListener evento =  new SerialPortEventListener() {
        @Override
        public void serialEvent(SerialPortEvent spe) {
      if(Arduino.MessageAvailable()){
        
          switch (Slot) {
              case 1:
                  if(Lecturas>1){
                      TableUpdate();
                  }         Slot=2;
                  Lecturas++;
                  time_1= Float.parseFloat(Arduino.PrintMessage());
                  break;
              case 2:
                  Slot=1;
                  Lecturas++;
                  time_2 = Float.parseFloat(Arduino.PrintMessage());
                  break;
              case 3:
                  Slot=2;
                  Lecturas++;
                  vel_1 = Float.parseFloat(Arduino.PrintMessage());
                  break;
              default:
                  break;
          }
      }
     }
    };
   
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane1 = new javax.swing.JScrollPane();
        jTable1 = new javax.swing.JTable();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jComboBox1 = new javax.swing.JComboBox<>();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {
                "Hora", "Tiempo 1", "Tiempo 2", "Velocidad 1", "Velocidad 2"
            }
        ));
        jScrollPane1.setViewportView(jTable1);

        jButton1.setText("Obtener Datos");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setText("Exportar a Excel");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        jComboBox1.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "COM1", "COM2", "COM3", "COM4" }));
        jComboBox1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jComboBox1ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(20, 20, 20)
                .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, 150, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(29, 29, 29))
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(10, 10, 10)
                        .addComponent(jComboBox1, javax.swing.GroupLayout.PREFERRED_SIZE, 108, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 375, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 106, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jComboBox1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 34, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton1)
                    .addComponent(jButton2))
                .addGap(7, 7, 7))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
        try {
            Arduino.SendData("1");
        } catch (Exception ex) {
            Logger.getLogger(Windows.class.getName()).log(Level.SEVERE, null, ex);
        }
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed

        javax.swing.JFileChooser ventana = new javax.swing.JFileChooser();
        String ruta;
        ruta = "C:\\xampp\\htdocs\\dashboard\\www";
        try {
            if (ventana.showSaveDialog(null) == JFileChooser.APPROVE_OPTION) {
                ruta = ventana.getSelectedFile().getAbsolutePath() + ".xlsx";
                FicheroExcel(ruta);
            }
        }
        catch (Exception ex){
            ex.printStackTrace();
        }
    }//GEN-LAST:event_jButton2ActionPerformed

    private void jComboBox1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jComboBox1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jComboBox1ActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Windows.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Windows.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Windows.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Windows.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(() -> {
            new Windows().setVisible(true);
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JComboBox<String> jComboBox1;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTable jTable1;
    // End of variables declaration//GEN-END:variables
}
