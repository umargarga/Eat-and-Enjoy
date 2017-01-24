


class RestaurantAdapter extends ArrayAdapter {
    List list = new ArrayList();
    LayoutInflater inflater = (LayoutInflater) getContext().getSystemService(Context.LAYOUT_INFLATER_SERVICE);

    public RestaurantAdapter(Context context, int resource) {
        super(context, resource);
    }
    
    public void add(Company object) {
        super.add(object);
        list.add(object);
    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Override
    public Object getItem(int position) {
        return list.get(position);
    }
    

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        RestaurantHolder restaurantHolder = new RestaurantHolder();
        if(convertView==null) {
            convertView = inflater.inflate(R.layout.list_item_view, null);
            
            restaurantHolder.title = (TextView) convertView.findViewById(R.id.titleView);
            restaurantHolder.address = (TextView) convertView.findViewById(R.id.addressView);
            restaurantHolder.type = (TextView) convertView.findViewById(R.id.typeView);
            restaurantHolder.rating = (RatingBar) convertView.findViewById(R.id.ratingBar);
            
            convertView.setTag(restaurantHolder);
        }
        Restaurant restaurant = new Restaurant();

        restaurantHolder.title.setText(restaurant.getTitle());
        restaurantHolder.type.setText(restaurant.getType());
        restaurantHolder.address.setText(restaurant.getAddress());
        restaurantHolder.rating.setRating(Float.parseFloat(restaurant.getAverageRating()));
        

        return convertView;
    }
}

class RestaurantHolder{
    public TextView title, address, type;
    public RatingBar rating;
}

