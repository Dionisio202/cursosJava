public void buscar(javax.swing.JTable tabla, String curso,String nivel){
    DefaultTableModel modelo ;
    modelo=(DefaultTableModel) tabla.getModel();
    modelo.setRowCount(0);
    try{
        HttpClient cliente = HttpClientBuilder.create().build();
        HttpGet get = new HttpGet("http://localhost/repasop/api.php?curso="+curso+"&nivel="+nivel);
        HttpResponse respuesta= cliente.execute(get);
        String info =EntityUtils.toString(respuesta.getEntity());
        JSONArray array= new JSONArray(info);
          modelo.setColumnIdentifiers(new Object[]{"Cedula", "Nombre", "Apellido", "Cursos"});
        for (int i = 0; i <array.length(); i++) {
            JSONObject objeto = array.getJSONObject(i);
            String cedula =objeto.getString("cedula");
            String nombre =objeto.getString("nombre");
            String apellido =objeto.getString("apellido");
            String cursos =objeto.getString("curso");
          modelo.addRow(new Object[]{cedula,nombre,apellido,cursos});
            
        }
        if(modelo.getRowCount()<1){
            JOptionPane.showMessageDialog(null,"No hay ese estudiante ");
        }
    }catch(Exception e){
        JOptionPane.showMessageDialog(null,"No hay ese estudiante "+e);
    }
}  