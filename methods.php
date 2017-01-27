
int selectedId = radioGroup.getCheckedRadioButtonId();
                // find the radiobutton by returned id
                radioButton = (RadioButton) findViewById(selectedId);
                brandName = (EditText) findViewById(R.id.brand);

                brand_name = brandName.getText().toString();
                brand_category = radioButton.getText().toString();


public class HttpTask extends AsyncTask<String, String, String> {
        @Override
        protected void onPostExecute(String s) {
            super.onPostExecute(s);
            Toast.makeText(getBaseContext(), "Company Registration Successful", Toast.LENGTH_LONG).show();
            //Intent i = new Intent(RegisterActivthis, LoginActivity.class);
            //startActivity(i);
        }


        @Override
        protected String doInBackground(String... params) {
            URL url;
            HttpURLConnection connection;
            try {
                url = new URL(params[0]);
                connection = (HttpURLConnection) url.openConnection();

                if (params[1].equals("POST")) {
                    connection.setRequestMethod("POST");
                    JSONObject data = new JSONObject();
                    data.put("Users_ID", "1");
                   

                    connection.setDoInput(true);
                    connection.setDoOutput(true);
                    connection.setRequestProperty("Content-Type", "application/json");

                    if (data != null) {
                        DataOutputStream outputStream = new DataOutputStream(connection.getOutputStream());
                        outputStream.writeBytes(data.toString());
                        outputStream.flush();
                        outputStream.close();
                    }
                    int responseCode = connection.getResponseCode();

                }else{
                    finish();
                }

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            } catch(Exception e){
                e.printStackTrace();
            }
            return null;
        }
    }
