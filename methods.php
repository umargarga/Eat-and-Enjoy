
class HttpTask extends AsyncTask<Void, Void, String> {
        String httpUrl;
        ProgressDialog progressDialog;
    
        @Override
        protected void onPreExecute() {
            httpUrl = "";

            progressDialog = ProgressDialog.show(MainActivity.this, "Loading", "Please wait");
            progressDialog.setCancelable(false);
        }

        @Override
        protected String doInBackground(Void... voids) {
            try {
                URL url = new URL(httpUrl);
                HttpURLConnection con = (HttpURLConnection) url.openConnection();
                con.setRequestMethod("GET");

                InputStream inputStream = con.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                StringBuilder stringBuilder = new StringBuilder();
                String result;
                while ((result = bufferedReader.readLine())!=null)
                {
                    stringBuilder.append(result+"\n");
                }
                bufferedReader.close();
                inputStream.close();
                con.disconnect();
                return stringBuilder.toString().trim();
            } catch (IOException e) {
                e.printStackTrace();
            }
            return null;
        }

        
        @Override
        protected void onPostExecute(String result) {
            Restaurant restaurant;
                try {
                    jsonObject = new JSONObject(result);
                    jsonArray = jsonObject.getJSONArray("restaurant");
                    int count = 0;

                    String title;
                    String address;
                    String type;
                    String rating;
                    String id;
    
                    while(count<jsonArray.length())
                    {
                        JSONObject obj = jsonArray.getJSONObject(count);
                        id = obj.getString("id");
                        title = obj.getString("title");
                        type = obj.getString("type");
                        address = obj.getString("address");
                        rating = obj.getString("rating");

                        restaurant = new Restaurant(id, title, address, type, rating);
                        restaurantAdapter.add(restaurant);
                        count++;
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
        }

    }
